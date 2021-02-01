<?php

namespace App\Repositories;

use App\Models\Categorias;
use App\Repositories\BaseRepository;

/**
 * Class CategoriasRepository
 * @package App\Repositories
 * @version January 29, 2021, 7:01 pm UTC
*/

class CategoriasRepository extends BaseRepository
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
        return Categorias::class;
    }
}
