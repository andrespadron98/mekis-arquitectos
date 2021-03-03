<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateContactosRequest;
use App\Http\Requests\UpdateContactosRequest;
use App\Repositories\ContactosRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class ContactosController extends AppBaseController
{
    /** @var  ContactosRepository */
    private $contactosRepository;

    public function __construct(ContactosRepository $contactosRepo)
    {
        $this->contactosRepository = $contactosRepo;
    }

    /**
     * Display a listing of the Contactos.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $contactos = $this->contactosRepository->all();

        return view('contactos.index')
            ->with('contactos', $contactos);
    }

    /**
     * Show the form for creating a new Contactos.
     *
     * @return Response
     */
    public function create()
    {
        return view('contactos.create');
    }

    /**
     * Store a newly created Contactos in storage.
     *
     * @param CreateContactosRequest $request
     *
     * @return Response
     */
    public function store(CreateContactosRequest $request)
    {
        $input = $request->all();

        $contactos = $this->contactosRepository->create($input);

        Flash::success('Mensaje enviado exitosamente, pronto nos comunicaremos contigo.');

        return redirect(route('contacto'));
    }

    /**
     * Display the specified Contactos.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $contactos = $this->contactosRepository->find($id);

        if (empty($contactos)) {
            Flash::error('Contactos not found');

            return redirect(route('contactos.index'));
        }

        return view('contactos.show')->with('contactos', $contactos);
    }

    /**
     * Show the form for editing the specified Contactos.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $contactos = $this->contactosRepository->find($id);

        if (empty($contactos)) {
            Flash::error('Contactos not found');

            return redirect(route('contactos.index'));
        }

        return view('contactos.edit')->with('contactos', $contactos);
    }

    /**
     * Update the specified Contactos in storage.
     *
     * @param int $id
     * @param UpdateContactosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateContactosRequest $request)
    {
        $contactos = $this->contactosRepository->find($id);

        if (empty($contactos)) {
            Flash::error('Contactos not found');

            return redirect(route('contactos.index'));
        }

        $contactos = $this->contactosRepository->update($request->all(), $id);

        Flash::success('Contactos updated successfully.');

        return redirect(route('contactos.index'));
    }

    /**
     * Remove the specified Contactos from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $contactos = $this->contactosRepository->find($id);

        if (empty($contactos)) {
            Flash::error('Contactos not found');

            return redirect(route('contactos.index'));
        }

        $this->contactosRepository->delete($id);

        Flash::success('Contactos deleted successfully.');

        return redirect(route('contactos.index'));
    }
}
