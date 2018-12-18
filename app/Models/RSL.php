<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;


class RSL extends Model
{
    use SoftDeletes;

    public $table = 'RSLs';
    

    protected $dates = ['deleted_at'];

    protected $primaryKey = 'idRSL';

    public $fillable = [
        'RSLName',
        'RSLDescription',
        'RSLStart',
        'RSLEnd',
        'idAnalysis',
        'idCompanyContact',
        'idCompany'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'RSLName' => 'string',
        'RSLDescription' => 'string',
        'idAnalysis' => 'integer',
        'idCompanyContact' => 'integer',
        'idCompany' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'RSLName' => 'required',
        'RSLStart' => 'date',
        'RSLEnd' => 'date'
    ];

    public function analysis()
    {
        return $this->belongsToMany('App\Models\Analysis', 'analysis_RSLs', 
          'RSLs_id', 'analysis_id');
    }

    public function requirements()
    {
        return $this->hasMany('App\Models\Requirement', 'idRsl');
    }

    protected static function boot() {
       parent::boot();

        static::deleting(function($rsls) { // before delete() method call this
             $rsls -> analysis()->delete();
             $rsls -> requirements()->delete();
             // do the rest of the cleanup...
        });
    }
}
