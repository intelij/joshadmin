<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;


class ContactLab extends Model
{
    use SoftDeletes;

    public $table = 'contactLabs';
    

    protected $dates = ['deleted_at'];

    protected $primaryKey = 'idLabsContact';

    public $fillable = [
        'labsContactName',
        'labsContactSurname',
        'LabsContactPhone',
        'labsContactMobile',
        'labsContactEmail',
        'labsContactTitle',
        'labsContactJobTitle',
        'idLabs'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'labsContactName' => 'string',
        'labsContactSurname' => 'string',
        'LabsContactPhone' => 'string',
        'labsContactMobile' => 'string',
        'labsContactEmail' => 'string',
        'labsContactTitle' => 'string',
        'labsContactJobTitle' => 'string',
        'idLabs' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'labsContactName' => 'required',
        'labsContactSurname' => 'required',
        'LabsContactPhone' => 'required',
        'labsContactMobile' => 'required',
        'labsContactEmail' => 'email',
        'labsContactTitle' => 'required',
        'labsContactJobTitle' => 'required'
    ];
}
