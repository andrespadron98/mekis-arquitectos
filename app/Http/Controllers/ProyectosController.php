<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProyectosRequest;
use App\Http\Requests\UpdateProyectosRequest;
use App\Repositories\ProyectosRepository;
use App\Models\ProyectosCategorias;
use App\Models\ProyectosImagenes;
use App\Models\Proyectos;
use App\Models\Categorias;
use App\Models\TiposProyectos;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class ProyectosController extends AppBaseController
{
    /**
     * Extensiones de imagen aceptadas. No se admite svg: puede llevar
     * JavaScript embebido y se sirve desde el mismo dominio.
     */
    private const MIMES_IMAGEN = 'jpeg,jpg,png,gif,webp';

    /** @var  ProyectosRepository */
    private $proyectosRepository;

    public function __construct(ProyectosRepository $proyectosRepo)
    {
        $this->proyectosRepository = $proyectosRepo;
    }

    /**
     * Reglas de validacion de las imagenes del proyecto.
     *
     * @param string $presencia  'required' al crear, 'nullable' al editar
     *
     * @return array
     */
    private function reglasImagenes($presencia)
    {
        // 20 MB para ambas: las fotos llegan directo de camara (en el servidor
        // habia una portada de 15 MB). El limite original de 2 MB en la portada
        // habria rechazado el flujo normal del cliente. El peso se resuelve
        // despues, en optimizarImagen(), no bloqueando la subida.
        return [
            'img_previsualizacion' => $presencia . '|image|mimes:' . self::MIMES_IMAGEN . '|max:20480',
            'img_contenido'        => $presencia . '|array',
            'img_contenido.*'      => 'image|mimes:' . self::MIMES_IMAGEN . '|max:20480',
        ];
    }

    /** Lado maximo en pixeles de la imagen de portada del proyecto. */
    private const LADO_PREVISUALIZACION = 1600;

    /** Lado maximo de las fotos de la galeria, que se abren en lightbox. */
    private const LADO_CONTENIDO = 2000;

    /**
     * Reduce y recomprime la imagen recien subida.
     *
     * Las fotos llegan directo de camara (se encontraron de 6000x4000 y 1.8 MB)
     * y se servian tal cual para mostrarse en miniaturas de ~400 px. Eso era el
     * grueso del peso del sitio. Si falta GD no hace nada: es preferible dejar
     * la imagen pesada antes que romper la subida.
     *
     * @param string $ruta   ruta absoluta del archivo ya movido
     * @param int    $maximo lado mayor permitido, en pixeles
     *
     * @return void
     */
    private function optimizarImagen($ruta, $maximo)
    {
        if (! function_exists('imagecreatefromjpeg') || ! is_readable($ruta)) {
            return;
        }

        $info = @getimagesize($ruta);
        if ($info === false) {
            return;
        }

        [$ancho, $alto] = $info;
        $escala = $maximo / max($ancho, $alto);

        // Ya es chica y liviana: no se toca, recomprimir solo degradaria.
        if ($escala >= 1 && filesize($ruta) < 400 * 1024) {
            return;
        }

        switch ($info[2]) {
            case IMAGETYPE_JPEG: $img = @imagecreatefromjpeg($ruta); break;
            case IMAGETYPE_PNG:  $img = @imagecreatefrompng($ruta);  break;
            case IMAGETYPE_WEBP: $img = @imagecreatefromwebp($ruta); break;
            default: return;
        }
        if (! $img) {
            return;
        }

        if ($escala < 1) {
            $nuevoAncho = (int) round($ancho * $escala);
            $nuevoAlto  = (int) round($alto * $escala);

            // Sin cuarto argumento: IMG_BICUBIC no lo acepta imagescale en
            // todos los builds de GD y devuelve false sin avisar.
            $nueva = @imagescale($img, $nuevoAncho, $nuevoAlto);

            if (! $nueva) {
                // Respaldo por si imagescale falla igual.
                $nueva = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                imagecopyresampled($nueva, $img, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
            }

            imagedestroy($img);
            $img = $nueva;
        }

        if ($info[2] === IMAGETYPE_PNG) {
            imagealphablending($img, false);
            imagesavealpha($img, true);
            @imagepng($img, $ruta, 8);
        } elseif ($info[2] === IMAGETYPE_WEBP) {
            @imagewebp($img, $ruta, 82);
        } else {
            @imagejpeg($img, $ruta, 82);
        }

        imagedestroy($img);
    }

    /**
     * Extension deducida del contenido real del archivo, no del nombre que
     * mando el cliente. Confiar en getClientOriginalExtension() permitia subir
     * un .php disfrazado de imagen y ejecutarlo desde el navegador.
     *
     * @param \Illuminate\Http\UploadedFile $file
     *
     * @return string
     */
    private function extensionSegura($file)
    {
        $extension = strtolower((string) $file->extension());

        return in_array($extension, explode(',', self::MIMES_IMAGEN)) ? $extension : 'jpg';
    }

    /**
     * Display a listing of the Proyectos.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $proyectos = $this->proyectosRepository->all();

        return view('proyectos.index')
            ->with('proyectos', $proyectos);
    }

    /**
     * Show the form for creating a new Proyectos.
     *
     * @return Response
     */
    public function create()
    {
        
        $categoriasItems = Categorias::pluck('nombre','id')->toArray();
        $tiposItems = TiposProyectos::pluck('nombre','id')->toArray();
        return view('proyectos.create')
                ->with('tiposItems', $tiposItems)
                ->with('categoriasItems', $categoriasItems);
    }

    /**
     * Store a newly created Proyectos in storage.
     *
     * @param CreateProyectosRequest $request
     *
     * @return Response
     */
    public function store(CreateProyectosRequest $request)
    {
        $input = $request->all();

        $request->validate($this->reglasImagenes('required'));

        $proyectos = $this->proyectosRepository->create($input);

        if ($request->hasFile('img_previsualizacion')){
            $file = $input['img_previsualizacion'];
            $filename = 'Previsualizacion-' . $proyectos->id . '.' . $this->extensionSegura($file);
            $file->move(public_path('previsualizaciones'), $filename);
            $this->optimizarImagen(public_path('previsualizaciones/' . $filename), self::LADO_PREVISUALIZACION);
            $input['img_previsualizacion'] = $filename;

            $proyectoUp = Proyectos::find($proyectos->id);
            $proyectoUp->img_previsualizacion = $filename;
            $proyectoUp->save();
        }


        if($request->hasfile('img_contenido')){
           foreach($request->file('img_contenido') as $row => $file){
                $file = $input['img_contenido'][$row];
                $filename = 'Contenido-' . $proyectos->id . '-' . $row . '.' . $this->extensionSegura($file);
                $file->move(public_path('contenido'), $filename);
                $this->optimizarImagen(public_path('contenido/' . $filename), self::LADO_CONTENIDO);

                $imagen = new ProyectosImagenes();
                $imagen->id_proyecto = $proyectos->id;
                $imagen->imagen = $filename;
                $imagen->save();

           }
        }

        $categorias = count($input['categorias']);
        for ($i=0; $i < $categorias; $i++) {
            $categoria = new ProyectosCategorias();
            $categoria->id_proyecto = $proyectos->id;
            $categoria->id_categoria = $input['categorias'][$i];
            $categoria->save();
        }

        Flash::success('Proyectos saved successfully.');

        return redirect(route('proyectosPortal.index'));
    }

    /**
     * Display the specified Proyectos.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $proyectos = $this->proyectosRepository->find($id);

        if (empty($proyectos)) {
            Flash::error('Proyectos not found');

            return redirect(route('proyectosPortal.index'));
        }

        return view('proyectos.show')->with('proyectos', $proyectos);
    }

    /**
     * Show the form for editing the specified Proyectos.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $proyectos = $this->proyectosRepository->find($id);

        if (empty($proyectos)) {
            Flash::error('Proyectos not found');

            return redirect(route('proyectosPortal.index'));
        }

        
        $categoriasItems = Categorias::pluck('nombre','id')->toArray();
        $tiposItems = TiposProyectos::pluck('nombre','id')->toArray();
        
        $categorias = ProyectosCategorias::where('id_proyecto', $id)->get();
        $arrayCategorias = "[";
        $i = 1;
        foreach ($categorias as $row) {
            if($i === count($categorias)){
                $arrayCategorias .= $row->id_categoria . ']';
            }else{
                $arrayCategorias .= $row->id_categoria . ', ';
            }
            $i++;
        }

        return view('proyectos.edit')
                ->with('proyectos', $proyectos)
                ->with('arrayCategorias', $arrayCategorias)
                ->with('tiposItems', $tiposItems)
                ->with('categoriasItems', $categoriasItems);

    }

    /**
     * Update the specified Proyectos in storage.
     *
     * @param int $id
     * @param UpdateProyectosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProyectosRequest $request)
    {
        $proyectos = $this->proyectosRepository->find($id);

        if (empty($proyectos)) {
            Flash::error('Proyectos not found');

            return redirect(route('proyectosPortal.index'));
        }

        $input = $request->all();

        $request->validate($this->reglasImagenes('nullable'));

        if ($request->hasFile('img_previsualizacion')){
            $file = $input['img_previsualizacion'];
            $filename = 'Previsualizacion-' . $proyectos->id . '.' . $this->extensionSegura($file);
            $file->move(public_path('previsualizaciones'), $filename);
            $this->optimizarImagen(public_path('previsualizaciones/' . $filename), self::LADO_PREVISUALIZACION);
            $input['img_previsualizacion'] = $filename;
        }else{
            $input['img_previsualizacion'] = $proyectos->img_previsualizacion;
        }


        if($request->hasfile('img_contenido')){
            ProyectosImagenes::where('id_proyecto', $id)->delete();
            foreach($request->file('img_contenido') as $row => $file){
                $file = $input['img_contenido'][$row];
                $filename = 'Contenido-' . $proyectos->id . '-' . $row . '.' . $this->extensionSegura($file);
                $file->move(public_path('contenido'), $filename);
                $this->optimizarImagen(public_path('contenido/' . $filename), self::LADO_CONTENIDO);

                $imagen = new ProyectosImagenes();
                $imagen->id_proyecto = $proyectos->id;
                $imagen->imagen = $filename;
                $imagen->save();

            }
        }


        $categorias = count($input['categorias']);
        ProyectosCategorias::where('id_proyecto', $id)->delete();
        for ($i=0; $i < $categorias; $i++) { 
            $categoria = new ProyectosCategorias();
            $categoria->id_proyecto = $proyectos->id;
            $categoria->id_categoria = $input['categorias'][$i];
            $categoria->save();
        }

        $proyectos = $this->proyectosRepository->update($input, $id);

        Flash::success('Proyectos updated successfully.');

        return redirect(route('proyectosPortal.index'));
    }

    /**
     * Remove the specified Proyectos from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $proyectos = $this->proyectosRepository->find($id);

        if (empty($proyectos)) {
            Flash::error('Proyectos not found');

            return redirect(route('proyectosPortal.index'));
        }

        $this->proyectosRepository->delete($id);

        Flash::success('Proyectos deleted successfully.');

        return redirect(route('proyectosPortal.index'));
    }
}
