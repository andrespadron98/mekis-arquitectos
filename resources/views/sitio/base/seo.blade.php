{{--
    Metadatos del sitio publico.

    Cada vista define su propio titulo y descripcion con:
        @section('titulo', 'Proyectos')
        @section('descripcion', 'Texto de hasta ~160 caracteres.')

    Si no los define, cae en los valores de marca de abajo.

    Contexto: hasta agosto de 2026 las ocho paginas compartian el mismo
    <title>Andres Mekis</title>, sin descripcion ni datos estructurados. Por eso
    los buscadores mostraban el sitio como "Andres Mekis" y no como el estudio.
--}}
@php
    $marca = 'A&L Mekis Arquitectos';

    // Blade escapa con e() el valor de un @section inline, asi que aqui llega
    // ya codificado. Se decodifica para trabajar con texto plano y que cada
    // salida (atributo HTML o JSON-LD) aplique su propio escapado una sola vez.
    $seccion = fn ($nombre) => trim(html_entity_decode(
        $__env->yieldContent($nombre), ENT_QUOTES, 'UTF-8'
    ));

    $tituloPagina = $seccion('titulo');
    $titulo = $tituloPagina !== ''
        ? $tituloPagina . ' | ' . $marca
        : $marca . ' | Arquitectura y Construcción en Chile';

    $descripcion = $seccion('descripcion');
    if ($descripcion === '') {
        $descripcion = 'Estudio de arquitectura y construcción en Santiago de Chile. Viviendas, remodelaciones, restaurantes y oficinas desde 1993.';
    }

    $correo   = $valores[5] ?? null;
    $telefono = $valores[6] ?? null;
    $imagen   = $seccion('imagenSocial') ?: asset('assets/images/a.jpeg');

    $datos = array_filter([
        '@context'      => 'https://schema.org',
        '@type'         => 'ProfessionalService',
        'name'          => $marca,
        'alternateName' => 'Mekis Arquitectos',
        'description'   => $descripcion,
        'url'           => url('/'),
        'logo'          => asset('assets/images/logo-mekis.png'),
        'image'         => $imagen,
        'email'         => $correo,
        'telephone'     => $telefono,
        'foundingDate'  => '1993',
        'address'       => [
            '@type'           => 'PostalAddress',
            'streetAddress'   => 'El Coihue 3770',
            'addressLocality' => 'Vitacura',
            'addressRegion'   => 'Región Metropolitana',
            'addressCountry'  => 'CL',
        ],
        'areaServed'    => ['@type' => 'Country', 'name' => 'Chile'],
        'knowsAbout'    => ['Arquitectura', 'Construcción', 'Remodelación', 'Diseño de interiores'],
        'sameAs'        => ['https://www.instagram.com/mekisarquitectos/'],
    ]);
@endphp
<title>{{ $titulo }}</title>
<meta name="description" content="{{ $descripcion }}">
<meta name="robots" content="@yield('robots', 'index, follow, max-image-preview:large')">
<link rel="canonical" href="{{ url()->current() }}">

<meta property="og:type" content="website">
<meta property="og:site_name" content="{{ $marca }}">
<meta property="og:locale" content="es_CL">
<meta property="og:title" content="{{ $titulo }}">
<meta property="og:description" content="{{ $descripcion }}">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:image" content="{{ $imagen }}">

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $titulo }}">
<meta name="twitter:description" content="{{ $descripcion }}">
<meta name="twitter:image" content="{{ $imagen }}">

<script type="application/ld+json">{!! json_encode($datos, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>

@if (request()->path() === '/')
    {{--
        Este es el bloque que Google usa para decidir el nombre del sitio en los
        resultados: exige el tipo WebSite y solo lo lee de la portada. El de
        arriba (ProfessionalService) describe a la empresa, pero no alimenta ese
        nombre. Sin esto, Google lo deduce del historial, y el sitio dijo
        "Andres Mekis" durante cinco anos.
    --}}
    <script type="application/ld+json">{!! json_encode([
        '@context'      => 'https://schema.org',
        '@type'         => 'WebSite',
        'name'          => $marca,
        'alternateName' => ['Mekis Arquitectos', 'A&L Mekis'],
        'url'           => url('/'),
    ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
@endif
