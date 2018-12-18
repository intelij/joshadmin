<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;


class Part extends Model
{
    use SoftDeletes;

    public $table = 'parts';
    

    protected $dates = ['deleted_at'];

    protected $primaryKey = 'idParts';

    public $fillable = [
        'partsDescription',
        'partsColor',
        'partsMaterial',
        'idReports'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'partsDescription' => 'string',
        'partsColor' => 'string',
        'partsMaterial' => 'string',
        'idReports' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'partsDescription' => 'required',
        'partsColor' => 'required',
        'partsMaterial' => 'required'
    ];
}
