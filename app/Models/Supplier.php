<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;



class Supplier extends Model
{

    public $table = 'Suppliers';
    

    protected $primaryKey = 'idSupplier';

    public $fillable = [
        'supplierName',
        'supplierAddress',
        'supplierCity',
        'supplierZip',
        'supplierPhone',
        'supplierEmail',
        'supplierContactPerson',
        'supplierPrivacy'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'supplierName' => 'string',
        'supplierAddress' => 'string',
        'supplierCity' => 'string',
        'supplierZip' => 'string',
        'supplierPhone' => 'string',
        'supplierEmail' => 'string',
        'supplierContactPerson' => 'string',
        'supplierPrivacy' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'supplierName' => 'required',
        'supplierAddress' => 'required',
        'supplierCity' => 'required',
        'supplierZip' => 'required',
        'supplierPhone' => 'required',
        'supplierEmail' => 'email'
    ];
}
