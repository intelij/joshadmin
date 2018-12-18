<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;


class Report extends Model
{
    use SoftDeletes;

    public $table = 'reports';
    

    protected $dates = ['deleted_at'];

    protected $primaryKey = 'idReports';

    public $fillable = [
        'reportsNumber',
        'reportsNumberLab',
        'reportsItemDescription',
        'ReportsColor',
        'reportsStyle',
        'reportsSKU',
        'idMetadata',
        'idSupplier',
        'reportDateIn',
        'reportsDateOut',
        'reportsRating',
        'idLabs'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'reportsNumber' => 'string',
        'reportsNumberLab' => 'string',
        'reportsItemDescription' => 'string',
        'ReportsColor' => 'string',
        'reportsStyle' => 'string',
        'reportsSKU' => 'string',
        'idMetadata' => 'integer',
        'idSupplier' => 'integer',
        'reportsRating' => 'string',
        'idLabs' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'reportsNumber' => 'required',
        'reportsNumberLab' => 'required',
        'ReportsColor' => 'required',
        'reportsStyle' => 'required',
        'reportsSKU' => 'required',
        'reportDateIn' => 'date',
        'reportsDateOut' => 'date',
        'reportsRating' => 'required'
    ];

    public function meta()
    {
        return $this->belongsToMany('App\Models\Metadata', 'reports_meta', 
          'reports_id', 'meta_id')->withPivot('value');
    }
}
