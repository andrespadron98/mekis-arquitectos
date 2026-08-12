<?php
/**
 * Auditoria del sitio publico. Se corre contra produccion y reporta de una sola
 * vez todo lo que este mal, en vez de ir descubriendo problemas de a uno.
 *
 *     php tools/auditoria-seo.php
 *     php tools/auditoria-seo.php http://127.0.0.1:8123     (contra local)
 *
 * Revisa, por pagina: estado HTTP, title, description, canonical, robots, h1,
 * idioma, Open Graph, validez de cada bloque JSON-LD, fugas de PHP o Blade,
 * contenido por http en pagina https e imagenes sin alt. Y del sitio: variantes
 * de dominio, robots.txt, sitemap, favicon, recursos rotos y rutas protegidas.
 */

$base = rtrim($argv[1] ?? 'https://mekisarquitectos.cl', '/');

$rutas = ['/', '/proyectos', '/construcciones', '/nosotros', '/inspiracion',
          '/prensa', '/contacto', '/contacto-exito', '/login'];
foreach ([7, 8, 9, 54, 66, 70, 76] as $id) $rutas[] = "/proyectos/$id";

$problemas = [];
$avisos    = [];
$paginas   = [];

function bajar($url)
{
    $ch = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true, CURLOPT_TIMEOUT => 45,
        CURLOPT_FOLLOWLOCATION => false, CURLOPT_USERAGENT => 'auditoria/1.0',
    ]);
    $body = (string) curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    return ['code' => $code, 'body' => $body];
}

function meta($h, $attr, $val)
{
    $q = preg_quote($val, '~');
    if (preg_match('~<meta[^>]+' . $attr . '="' . $q . '"[^>]+content="([^"]*)"~i', $h, $m)
        || preg_match('~<meta[^>]+content="([^"]*)"[^>]+' . $attr . '="' . $q . '"~i', $h, $m)) {
        return html_entity_decode($m[1], ENT_QUOTES, 'UTF-8');
    }
    return null;
}

echo "════ PAGINA POR PAGINA ════\n";
foreach ($rutas as $ruta) {
    $r = bajar($base . $ruta);
    $h = $r['body'];
    $p = ['ruta' => $ruta, 'code' => $r['code'], 'h1' => 0, 'ld' => []];

    if ($r['code'] !== 200) {
        $problemas[] = "$ruta devuelve HTTP {$r['code']}";
        $paginas[] = $p;
        continue;
    }

    preg_match('~<title>(.*?)</title>~s', $h, $m);
    $p['title'] = isset($m[1]) ? html_entity_decode(trim($m[1]), ENT_QUOTES, 'UTF-8') : null;
    if (! $p['title']) $problemas[] = "$ruta sin <title>";
    elseif (mb_strlen($p['title']) > 65) $avisos[] = "$ruta title de " . mb_strlen($p['title']) . ' car. (Google corta ~60)';

    // Una pagina noindex no necesita metadatos de indexacion: no va a aparecer
    // en buscadores. Se le exige solo lo que la hace correcta.
    $p['robots'] = meta($h, 'name', 'robots');
    $indexable = ! $p['robots'] || stripos($p['robots'], 'noindex') === false;

    $p['desc'] = meta($h, 'name', 'description');
    if ($indexable) {
        if (! $p['desc']) $problemas[] = "$ruta sin meta description";
        elseif (mb_strlen($p['desc']) > 165) $avisos[] = "$ruta description de " . mb_strlen($p['desc']) . ' car.';
        elseif (mb_strlen($p['desc']) < 50) $avisos[] = "$ruta description muy corta";
        if (! $p['robots']) $avisos[] = "$ruta sin meta robots";
    }

    preg_match('~<link[^>]+rel="canonical"[^>]+href="([^"]*)"~i', $h, $m);
    $p['canonical'] = $m[1] ?? null;
    $esperado = $base . ($ruta === '/' ? '/' : $ruta);
    if (! $p['canonical']) { if ($indexable) $problemas[] = "$ruta sin canonical"; }
    elseif ($p['canonical'] !== $esperado) $problemas[] = "$ruta canonical apunta a {$p['canonical']} (esperado $esperado)";

    preg_match_all('~<h1[^>]*>(.*?)</h1>~s', $h, $m);
    $p['h1'] = count($m[1]);
    if ($p['h1'] === 0) $problemas[] = "$ruta sin <h1>";
    elseif ($p['h1'] > 1) $problemas[] = "$ruta tiene {$p['h1']} <h1> (debe ser uno)";

    if (! preg_match('~<html[^>]+lang="es"~i', $h)) $problemas[] = "$ruta sin lang=\"es\"";

    if ($indexable) {
        foreach (['og:title', 'og:description', 'og:url', 'og:image', 'og:site_name'] as $og) {
            if (! meta($h, 'property', $og)) $problemas[] = "$ruta sin $og";
        }
        $ogUrl = meta($h, 'property', 'og:url');
        if ($ogUrl && $ogUrl !== $esperado) $problemas[] = "$ruta og:url = $ogUrl (esperado $esperado)";
    }

    preg_match_all('~<script type="application/ld\+json">(.*?)</script>~s', $h, $m);
    foreach ($m[1] as $j) {
        $d = json_decode($j, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            $problemas[] = "$ruta tiene JSON-LD invalido: " . json_last_error_msg();
            continue;
        }
        $p['ld'][] = $d['@type'] ?? '?';
    }
    if (! $p['ld'] && $indexable) $problemas[] = "$ruta sin datos estructurados";
    if ($ruta === '/' && ! in_array('WebSite', $p['ld'], true)) $problemas[] = 'la portada no emite schema WebSite';
    if ($ruta !== '/' && in_array('WebSite', $p['ld'], true)) $problemas[] = "$ruta emite WebSite (solo va en la portada)";

    if (strpos($h, '<?php') !== false) $problemas[] = "$ruta filtra codigo PHP en el HTML";
    if (preg_match('~\{\{|\{!!~', $h)) $problemas[] = "$ruta filtra sintaxis Blade sin procesar";

    if (preg_match_all('~(?:src|href)="(http://[^"]+)"~i', $h, $mm)) {
        $ext = array_unique(array_filter($mm[1], fn($u) => strpos($u, 'mekisarquitectos.cl') === false));
        if ($ext) $problemas[] = "$ruta carga recursos por http: " . implode(', ', array_slice($ext, 0, 2));
    }

    preg_match_all('~<img[^>]*>~i', $h, $mm);
    $sinAlt = count(array_filter($mm[0], fn($i) => ! preg_match('~\salt=~i', $i)));
    if ($sinAlt) $problemas[] = "$ruta tiene $sinAlt <img> sin atributo alt";

    $paginas[] = $p;
    printf("  %-22s %s  h1:%d  %-26s %s\n", $ruta, $r['code'], $p['h1'],
        implode('+', $p['ld']) ?: '-', mb_substr($p['title'] ?? '', 0, 38));
}

echo "\n════ DUPLICADOS ════\n";
foreach (['title', 'desc'] as $campo) {
    $vistos = [];
    foreach ($paginas as $p) {
        if (empty($p[$campo])) continue;
        $vistos[$p[$campo]][] = $p['ruta'];
    }
    foreach (array_filter($vistos, fn($v) => count($v) > 1) as $valor => $rs) {
        $problemas[] = "$campo repetido en " . implode(', ', $rs);
    }
    printf("  %-6s %d distintos de %d paginas\n", $campo, count($vistos), count($paginas));
}

echo "\n════ SITIO ════\n";
foreach (['https://www.mekisarquitectos.cl/', 'http://mekisarquitectos.cl/', 'http://www.mekisarquitectos.cl/'] as $u) {
    $ch = curl_init($u);
    curl_setopt_array($ch, [CURLOPT_RETURNTRANSFER => true, CURLOPT_TIMEOUT => 30,
        CURLOPT_FOLLOWLOCATION => true, CURLOPT_NOBODY => true]);
    curl_exec($ch);
    $fin = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
    curl_close($ch);
    if ($fin !== 'https://mekisarquitectos.cl/') $problemas[] = "$u termina en $fin";
    printf("  %-38s -> %s\n", $u, $fin);
}

$rt = bajar("$base/robots.txt");
printf("  robots.txt: HTTP %d%s\n", $rt['code'], stripos($rt['body'], 'sitemap:') !== false ? ', declara el sitemap' : '');
if ($rt['code'] !== 200) $problemas[] = 'robots.txt no responde 200';
if (stripos($rt['body'], 'sitemap:') === false) $avisos[] = 'robots.txt no declara el sitemap';

$sm = bajar("$base/sitemap.xml");
if ($sm['code'] !== 200) $problemas[] = 'sitemap.xml no responde 200';
else {
    $xml = @simplexml_load_string($sm['body']);
    if (! $xml) $problemas[] = 'sitemap.xml no es XML valido';
    else {
        $locs = array_map('strval', iterator_to_array($xml->url->loc ?? [], false));
        $locs = [];
        foreach ($xml->url as $u) $locs[] = (string) $u->loc;
        printf("  sitemap.xml: %d URLs\n", count($locs));
        foreach ($locs as $l) {
            if (preg_match('~\.(php|phtml|jpe?g|png|gif|jfif)$~i', $l)) $problemas[] = "sitemap incluye un archivo: $l";
            if (strpos($l, 'www.') !== false) $problemas[] = "sitemap usa www: $l";
        }
        foreach (array_slice($locs, 0, 6) as $l) {
            $c = bajar($l)['code'];
            if ($c !== 200) $problemas[] = "sitemap apunta a $l que devuelve $c";
        }
    }
}

$fav = bajar("$base/favicon.ico");
printf("  favicon.ico: HTTP %d, %d bytes\n", $fav['code'], strlen($fav['body']));
if ($fav['code'] !== 200 || strlen($fav['body']) < 100) $problemas[] = 'favicon.ico vacio o ausente';
else {
    $hh = unpack('vres/vtipo/vcount', substr($fav['body'], 0, 6));
    $e  = unpack('Cw/Ch', substr($fav['body'], 6, 2));
    if (($hh['tipo'] ?? 0) !== 1) $problemas[] = 'favicon.ico no es un icono valido';
    if ($e['w'] !== $e['h']) $problemas[] = 'favicon.ico no es cuadrado';
}

$home = bajar("$base/")['body'];
preg_match_all('~(?:href|src)="([^"]+\.(?:css|js|png|jpe?g|ico))"~i', $home, $mm);
$rotos = [];
foreach (array_unique($mm[1]) as $u) {
    if (strpos($u, 'http') === 0 && strpos($u, 'mekisarquitectos.cl') === false) continue;
    $full = strpos($u, 'http') === 0 ? $u : $base . '/' . ltrim($u, '/');
    $ch = curl_init($full);
    curl_setopt_array($ch, [CURLOPT_NOBODY => true, CURLOPT_TIMEOUT => 20, CURLOPT_RETURNTRANSFER => true]);
    curl_exec($ch);
    $c = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    if ($c !== 200) $rotos[] = "$u ($c)";
}
printf("  recursos propios de la portada: %d revisados, %d rotos\n", count(array_unique($mm[1])), count($rotos));
foreach ($rotos as $r2) $problemas[] = "recurso roto en la portada: $r2";

echo "\n════ SEGURIDAD ════\n";
$esperados = [
    '/contenido/x.php' => 403, '/css/x.php' => 403, '/.git/config' => 403,
    '/vendor/autoload.php' => 403, '/storage/logs/laravel.log' => 403,
    '/register' => 404, '/_ignition/health-check' => 404,
    '/proyectosPortal' => 302, '/users' => 302,
];
foreach ($esperados as $ruta => $esp) {
    $c = bajar($base . $ruta)['code'];
    printf("  %-28s %s (esperado %s)%s\n", $ruta, $c, $esp, $c === $esp ? '' : '  <-- REVISAR');
    if ($c !== $esp) $problemas[] = "$ruta devuelve $c, se esperaba $esp";
}

echo "\n" . str_repeat('=', 60) . "\n";
printf("PROBLEMAS: %d    AVISOS: %d\n\n", count($problemas), count($avisos));
foreach ($problemas as $i => $x) printf("  [%02d] %s\n", $i + 1, $x);
foreach ($avisos as $x) echo "  aviso: $x\n";
if (! $problemas && ! $avisos) echo "  Sin hallazgos.\n";
