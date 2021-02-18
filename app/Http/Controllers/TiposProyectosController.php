<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTiposProyectosRequest;
use App\Http\Requests\UpdateTiposProyectosRequest;
use App\Repositories\TiposProyectosRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class TiposProyectosController extends AppBaseController
{
    /** @var  TiposProyectosRepository */
    private $tiposProyectosRepository;

    public function __construct(TiposProyectosRepository $tiposProyectosRepo)
    {
        $this->tiposProyectosRepository = $tiposProyectosRepo;
    }

    /**
     * Display a listing of the TiposProyectos.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $tiposProyectos = $this->tiposProyectosRepository->all();

        return view('tipos_proyectos.index')
            ->with('tiposProyectos', $tiposProyectos);
    }

    /**
     * Show the form for creating a new TiposProyectos.
     *
     * @return Response
     */
    public function create()
    {
        return view('tipos_proyectos.create');
    }

    /**
     * Store a newly created TiposProyectos in storage.
     *
     * @param CreateTiposProyectosRequest $request
     *
     * @return Response
     */
    public function store(CreateTiposProyectosRequest $request)
    {
        $input = $request->all();

        $tiposProyectos = $this->tiposProyectosRepository->create($input);

        Flash::success('Tipos Proyectos saved successfully.');

        return redirect(route('tiposProyectos.index'));
    }

    /**
     * Display the specified TiposProyectos.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tiposProyectos = $this->tiposProyectosRepository->find($id);

        if (empty($tiposProyectos)) {
            Flash::error('Tipos Proyectos not found');

            return redirect(route('tiposProyectos.index'));
        }

        return view('tipos_proyectos.show')->with('tiposProyectos', $tiposProyectos);
    }

    /**
     * Show the form for editing the specified TiposProyectos.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tiposProyectos = $this->tiposProyectosRepository->find($id);

        if (empty($tiposProyectos)) {
            Flash::error('Tipos Proyectos not found');

            return redirect(route('tiposProyectos.index'));
        }

        return view('tipos_proyectos.edit')->with('tiposProyectos', $tiposProyectos);
    }

    /**
     * Update the specified TiposProyectos in storage.
     *
     * @param int $id
     * @param UpdateTiposProyectosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTiposProyectosRequest $request)
    {
        $tiposProyectos = $this->tiposProyectosRepository->find($id);

        if (empty($tiposProyectos)) {
            Flash::error('Tipos Proyectos not found');

            return redirect(route('tiposProyectos.index'));
        }

        $tiposProyectos = $this->tiposProyectosRepository->update($request->all(), $id);

        Flash::success('Tipos Proyectos updated successfully.');

        return redirect(route('tiposProyectos.index'));
    }

    /**
     * Remove the specified TiposProyectos from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tiposProyectos = $this->tiposProyectosRepository->find($id);

        if (empty($tiposProyectos)) {
            Flash::error('Tipos Proyectos not found');

            return redirect(route('tiposProyectos.index'));
        }

        $this->tiposProyectosRepository->delete($id);

        Flash::success('Tipos Proyectos deleted successfully.');

        return redirect(route('tiposProyectos.index'));
    }
}
