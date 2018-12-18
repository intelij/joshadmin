<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;



class Company extends Model
{

    public $table = 'company';
    

    protected $primaryKey = 'idCompany';

    public $fillable = [
        'companyName',
        'companyAddress',
        'CompanyCity',
        'companyPhone',
        'companyEmail',
        'companyVat',
        'companyGrade',
        'companyLink',
        'CompanyZip',
        'idCompanyGrade',
        'idCompanyOption'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'companyName' => 'string',
        'companyAddress' => 'string',
        'CompanyCity' => 'string',
        'companyPhone' => 'string',
        'companyEmail' => 'string',
        'companyVat' => 'string',
        'companyGrade' => 'string',
        'companyLink' => 'string',
        'CompanyZip' => 'string',
        'idCompanyGrade' => 'integer',
        'idCompanyOption' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'companyName' => 'required',
        'companyAddress' => 'required',
        'CompanyCity' => 'required',
        'companyPhone' => 'required',
        'companyEmail' => 'email',
        'companyVat' => 'required',
        'companyGrade' => 'required',
        'companyLink' => 'required',
        'CompanyZip' => 'required'
    ];

    function getCompanyById($id) {
        return Company::find($id)->first();
    }
}
