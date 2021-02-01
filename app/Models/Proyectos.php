<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Proyectos
 * @package App\Models
 * @version January 29, 2021, 7:08 pm UTC
 *
 * @property string $nombre
 * @property string $comuna
 * @property string $ciudad
 * @property string $descripcion
 * @property integer $habitaciones
 * @property integer $metros_cuadrados_terreno
 * @property integer $piscina
 * @property integer $jacuzzi
 * @property integer $estacionamientos
 * @property string $img_previsualizacion
 */
class Proyectos extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'proyectos';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'nombre',
        'comuna',
        'ciudad',
        'descripcion',
        'habitaciones',
        'banos',
        'metros_cuadrados',
        'metros_cuadrados_terreno',
        'metros_cuadrados_terraza',
        'piscina',
        'jacuzzi',
        'estacionamientos',
        'img_previsualizacion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'comuna' => 'string',
        'ciudad' => 'string',
        'banos' => 'integer',
        'habitaciones' => 'integer',
        'metros_cuadrados' => 'integer',
        'metros_cuadrados_terraza' => 'integer',
        'metros_cuadrados_terreno' => 'integer',
        'piscina' => 'integer',
        'jacuzzi' => 'integer',
        'estacionamientos' => 'integer',
        'img_previsualizacion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required',
        'comuna' => 'required',
        'ciudad' => 'required',
        'descripcion' => 'required',
        'banos' => 'required',
        'habitaciones' => 'required',
        'metros_cuadrados' => 'required',
        'metros_cuadrados_terreno' => 'required',
        'metros_cuadrados_terraza' => 'required',
        'piscina' => 'required',
        'jacuzzi' => 'required',
        'estacionamientos' => 'required',
        // 'img_contenido' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ];

    
}
