<?php

namespace App\Repositories;

use App\Models\Configuraciones;
use App\Repositories\BaseRepository;

/**
 * Class ConfiguracionesRepository
 * @package App\Repositories
 * @version January 28, 2021, 6:50 pm UTC
*/

class ConfiguracionesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'valor'
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
        return Configuraciones::class;
    }
}
