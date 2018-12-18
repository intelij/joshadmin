<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;


class Lab extends Model
{
    use SoftDeletes;

    public $table = 'Labs';
    

    protected $dates = ['deleted_at'];

    protected $primaryKey = 'idLabs';

    public $fillable = [
        'LabsName',
        'LabsAddress',
        'LabsCity',
        'LabsZip',
        'LabsPhone',
        'LabsEmail',
        'LabsCountry',
        'LabsFormat'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'LabsName' => 'string',
        'LabsAddress' => 'string',
        'LabsCity' => 'string',
        'LabsZip' => 'string',
        'LabsPhone' => 'string',
        'LabsEmail' => 'string',
        'LabsCountry' => 'string',
        'LabsFormat' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'LabsName' => 'required',
        'LabsAddress' => 'required',
        'LabsCity' => 'required',
        'LabsZip' => 'required',
        'LabsPhone' => 'required',
        'LabsEmail' => 'email',
        'LabsCountry' => 'required',
        'LabsFormat' => 'required'
    ];
}
