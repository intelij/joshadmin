<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;


class Analysis extends Model
{
    // use SoftDeletes;

    public $table = 'analysis';
    

    protected $dates = ['deleted_at'];

    protected $primaryKey = 'idAnalysis';

    public $fillable = [
        'anaysisName',
        'anaysisDescription',
        'idComponents'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'anaysisName' => 'string',
        'anaysisDescription' => 'string',
        'idComponents' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'anaysisName' => 'required'
    ];

    public function RSLs()
    {
        return $this->belongsToMany('App\Models\RSL', 'analysis_RSLs', 
          'analysis_id', 'RSLs_id');
    }

    public function components()
    {
        return $this->hasMany('App\Models\Component', 'idAnalysis');
    }

    public function requirements()
    {
        return $this->hasMany('App\Models\Requirement', 'idAnalysis');
    }

    protected static function boot() {
       parent::boot();

        static::deleting(function($analysis) { // before delete() method call this
             $analysis ->components()->delete();
             $analysis ->requirements() -> delete();
             // do the rest of the cleanup...
        });
    }
}
