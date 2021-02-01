<?php

namespace App\Repositories;

use App\Models\Proyectos;
use App\Repositories\BaseRepository;

/**
 * Class ProyectosRepository
 * @package App\Repositories
 * @version January 29, 2021, 7:08 pm UTC
*/

class ProyectosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'comuna',
        'ciudad',
        'descripcion',
        'habitaciones',
        'metros_cuadrados_terreno',
        'piscina',
        'jacuzzi',
        'estacionamientos',
        'img_previsualizacion'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Proyectos::class;
    }
}
