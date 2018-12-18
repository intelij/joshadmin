<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;


class DepartmentCompany extends Model
{
    use SoftDeletes;

    public $table = 'departmentCompany';
    

    protected $dates = ['deleted_at'];

    protected $primaryKey = 'idCompanyDepartment';

    public $fillable = [
        'departmentName',
        'departmentAddress',
        'departmentCity',
        'departmentZIP',
        'DepartmentPhone',
        'departmentEmail',
        'idCompany'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'departmentName' => 'string',
        'departmentAddress' => 'string',
        'departmentCity' => 'string',
        'departmentZIP' => 'string',
        'DepartmentPhone' => 'string',
        'departmentEmail' => 'string',
        'idCompany' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'departmentName' => 'required',
        'departmentAddress' => 'required',
        'departmentCity' => 'required',
        'departmentZIP' => 'required',
        'DepartmentPhone' => 'required',
        'departmentEmail' => 'required'
    ];
}
