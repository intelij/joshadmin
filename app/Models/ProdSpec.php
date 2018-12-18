<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;


class ProdSpec extends Model
{
    use SoftDeletes;

    public $table = 'ProdSpecs';
    

    protected $dates = ['deleted_at'];

    protected $primaryKey = 'idProdSpec';

    public $fillable = [
        'prodSpecValue',
        'prodSpecMU',
        'prodSpecReference',
        'idRSL',
        'idAnalysis',
        'idComponents',
        'idUnitMeasure'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'prodSpecValue' => 'string',
        'prodSpecMU' => 'string',
        'prodSpecReference' => 'string',
        'idRSL' => 'integer',
        'idAnalysis' => 'integer',
        'idComponents' => 'integer',
        'idUnitMeasure' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'prodSpecValue' => 'required',
        'prodSpecMU' => 'required'
    ];
}
