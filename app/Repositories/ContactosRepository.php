<?php

namespace App\Repositories;

use App\Models\Contactos;
use App\Repositories\BaseRepository;

/**
 * Class ContactosRepository
 * @package App\Repositories
 * @version March 3, 2021, 2:30 pm UTC
*/

class ContactosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'celular',
        'correo',
        'cuentanos'
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
        return Contactos::class;
    }
}
