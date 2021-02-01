<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Configuraciones
 * @package App\Models
 * @version January 28, 2021, 6:50 pm UTC
 *
 * @property string $nombre
 * @property string $valor
 */
class Configuraciones extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'configuraciones';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'nombre',
        'valor'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'valor' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required',
        'valor' => 'required'
    ];

    
}
