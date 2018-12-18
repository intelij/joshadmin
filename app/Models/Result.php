<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;


class Result extends Model
{
    use SoftDeletes;

    public $table = 'results';
    

    protected $dates = ['deleted_at'];

    protected $primaryKey = 'idResults';

    public $fillable = [
        'resultsComments',
        'resultsLabRating',
        'idParts',
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
        'resultsComments' => 'string',
        'resultsLabRating' => 'string',
        'idParts' => 'integer',
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
        'resultsComments' => 'required',
        'resultsLabRating' => 'required'
    ];
}
