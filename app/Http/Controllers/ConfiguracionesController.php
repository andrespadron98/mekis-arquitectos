<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateConfiguracionesRequest;
use App\Http\Requests\UpdateConfiguracionesRequest;
use App\Repositories\ConfiguracionesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class ConfiguracionesController extends AppBaseController
{
    /** @var  ConfiguracionesRepository */
    private $configuracionesRepository;

    public function __construct(ConfiguracionesRepository $configuracionesRepo)
    {
        $this->configuracionesRepository = $configuracionesRepo;
    }

    /**
     * Display a listing of the Configuraciones.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $configuraciones = $this->configuracionesRepository->all();

        return view('configuraciones.index')
            ->with('configuraciones', $configuraciones);
    }

    /**
     * Show the form for creating a new Configuraciones.
     *
     * @return Response
     */
    public function create()
    {
        return view('configuraciones.create');
    }

    /**
     * Store a newly created Configuraciones in storage.
     *
     * @param CreateConfiguracionesRequest $request
     *
     * @return Response
     */
    public function store(CreateConfiguracionesRequest $request)
    {
        $input = $request->all();

        $configuraciones = $this->configuracionesRepository->create($input);

        Flash::success('Configuraciones saved successfully.');

        return redirect(route('configuraciones.index'));
    }

    /**
     * Display the specified Configuraciones.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $configuraciones = $this->configuracionesRepository->find($id);

        if (empty($configuraciones)) {
            Flash::error('Configuraciones not found');

            return redirect(route('configuraciones.index'));
        }

        return view('configuraciones.show')->with('configuraciones', $configuraciones);
    }

    /**
     * Show the form for editing the specified Configuraciones.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $configuraciones = $this->configuracionesRepository->find($id);

        if (empty($configuraciones)) {
            Flash::error('Configuraciones not found');

            return redirect(route('configuraciones.index'));
        }

        return view('configuraciones.edit')->with('configuraciones', $configuraciones);
    }

    /**
     * Update the specified Configuraciones in storage.
     *
     * @param int $id
     * @param UpdateConfiguracionesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateConfiguracionesRequest $request)
    {
        $configuraciones = $this->configuracionesRepository->find($id);

        if (empty($configuraciones)) {
            Flash::error('Configuraciones not found');

            return redirect(route('configuraciones.index'));
        }

        $configuraciones = $this->configuracionesRepository->update($request->all(), $id);

        Flash::success('Configuraciones updated successfully.');

        return redirect(route('configuraciones.index'));
    }

    /**
     * Remove the specified Configuraciones from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $configuraciones = $this->configuracionesRepository->find($id);

        if (empty($configuraciones)) {
            Flash::error('Configuraciones not found');

            return redirect(route('configuraciones.index'));
        }

        $this->configuracionesRepository->delete($id);

        Flash::success('Configuraciones deleted successfully.');

        return redirect(route('configuraciones.index'));
    }
}
