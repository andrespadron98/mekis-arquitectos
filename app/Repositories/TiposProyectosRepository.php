<?php

namespace App\Repositories;

use App\Models\TiposProyectos;
use App\Repositories\BaseRepository;

/**
 * Class TiposProyectosRepository
 * @package App\Repositories
 * @version February 18, 2021, 8:50 pm UTC
*/

class TiposProyectosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre'
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
        return TiposProyectos::class;
    }
}
