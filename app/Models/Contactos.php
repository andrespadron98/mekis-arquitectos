<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Contactos
 * @package App\Models
 * @version March 3, 2021, 2:30 pm UTC
 *
 * @property string $nombre
 * @property string $celular
 * @property string $correo
 * @property string $cuentanos
 */
class Contactos extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'contactos';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'nombre',
        'celular',
        'correo',
        'cuentanos'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'celular' => 'string',
        'correo' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required',
        'celular' => 'required',
        'correo' => 'required|email'
    ];

    
}
