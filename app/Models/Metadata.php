<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;


class Metadata extends Model
{
    use SoftDeletes;

    public $table = 'Metadata';
    

    protected $dates = ['deleted_at'];

    protected $primaryKey = 'idMetadata';

    public $fillable = [
        'metadataName'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'metadataName' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'metadataName' => 'required'
    ];

    public function reports()
    {
        return $this->belongsToMany('App\Models\Report', 'reports_meta', 
          'meta_id', 'reports_id')->withPivot('value');
    }

}
