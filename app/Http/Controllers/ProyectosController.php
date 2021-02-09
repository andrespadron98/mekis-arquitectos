<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProyectosRequest;
use App\Http\Requests\UpdateProyectosRequest;
use App\Repositories\ProyectosRepository;
use App\Models\ProyectosCategorias;
use App\Models\ProyectosImagenes;
use App\Models\Proyectos;
use App\Models\Categorias;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class ProyectosController extends AppBaseController
{
    /** @var  ProyectosRepository */
    private $proyectosRepository;

    public function __construct(ProyectosRepository $proyectosRepo)
    {
        $this->proyectosRepository = $proyectosRepo;
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
        return view('proyectos.create')
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

        $request->validate([
            'img_contenido' => 'required',
            'img_previsualizacion' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $proyectos = $this->proyectosRepository->create($input);
        
        if ($request->hasFile('img_previsualizacion')){
            $file = $input['img_previsualizacion'];
            $filename = 'Previsualizacion-' . $proyectos->id . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('previsualizaciones'), $filename);
            $input['img_previsualizacion'] = $filename;

            $proyectoUp = Proyectos::find($proyectos->id);
            $proyectoUp->img_previsualizacion = $filename;
            $proyectoUp->save();
        }


        if($request->hasfile('img_contenido')){
           foreach($request->file('img_contenido') as $row => $file){
                $file = $input['img_contenido'][$row];
                $filename = 'Contenido-' . $proyectos->id . '-' . $row . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('contenido'), $filename);

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
        
        if ($request->hasFile('img_previsualizacion')){
            $file = $input['img_previsualizacion'];
            $filename = 'Previsualizacion-' . $proyectos->id . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('previsualizaciones'), $filename);
            $input['img_previsualizacion'] = $filename;
        }else{
            $input['img_previsualizacion'] = $proyectos->img_previsualizacion;
        }


        if($request->hasfile('img_contenido')){
            ProyectosImagenes::where('id_proyecto', $id)->delete();
            foreach($request->file('img_contenido') as $row => $file){
                $file = $input['img_contenido'][$row];
                $filename = 'Contenido-' . $proyectos->id . '-' . $row . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('contenido'), $filename);

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
