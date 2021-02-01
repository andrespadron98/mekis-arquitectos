<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class ProyectosImagenes
 * @package App\Models
 * @version January 29, 2021, 7:23 pm UTC
 *
 * @property integer $id_proyecto
 * @property string $imagen
 */
class ProyectosImagenes extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'proyectos_imagenes';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'id_proyecto',
        'imagen'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_proyecto' => 'integer',
        'imagen' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_proyecto' => 'required',
        'imagen' => 'required'
    ];

    
}
