<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;


class ContactCompany extends Model
{
    use SoftDeletes;

    public $table = 'Contactcompany';
    

    protected $dates = ['deleted_at'];

    protected $primaryKey = 'idCompanyContact';

    public $fillable = [
        'companyContactName',
        'CompanyContactSurname',
        'companyContactPhone',
        'companyContactEmail',
        'CompanyContactTitle',
        'companyContactPrimary',
        'idCompany',
        'idCompanyDepartment',
        'idRoles'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'companyContactName' => 'string',
        'CompanyContactSurname' => 'string',
        'companyContactPhone' => 'string',
        'companyContactEmail' => 'string',
        'CompanyContactTitle' => 'string',
        'companyContactPrimary' => 'string',
        'idCompany' => 'integer',
        'idCompanyDepartment' => 'integer',
        'idRoles' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'companyContactName' => 'required',
        'CompanyContactSurname' => 'required',
        'companyContactPhone' => 'required',
        'companyContactEmail' => 'email',
        'CompanyContactTitle' => 'required',
        'companyContactPrimary' => 'required'
    ];
}
