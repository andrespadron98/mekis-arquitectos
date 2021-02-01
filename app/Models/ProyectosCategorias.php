<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class ProyectosCategorias
 * @package App\Models
 * @version January 29, 2021, 7:23 pm UTC
 *
 * @property integer $id_proyecto
 * @property integer $id_categoria
 */
class ProyectosCategorias extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'proyectos_categorias';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'id_proyecto',
        'id_categoria'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_proyecto' => 'integer',
        'id_categoria' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_proyecto' => 'required',
        'id_categoria' => 'required'
    ];

    
}
