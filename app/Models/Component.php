<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Component extends Model
{
    // use SoftDeletes;

    public $table = 'components';
    

    protected $dates = ['deleted_at'];

    protected $primaryKey = 'idComponents';

    public $fillable = [
        'ComponentsName',
        'ComponentsDescription',
        'ComponentsCAS',
        'ComponentsFomular',
        'idComponentsFamily',
        'idAnalysis'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'ComponentsName' => 'string',
        'ComponentsDescription' => 'string',
        'ComponentsCAS' => 'string',
        'ComponentsFomular' => 'string',
        'idComponentsFamily' => 'integer',
        'idAnalysis' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'ComponentsName' => 'required',
        'ComponentsCAS' => 'required',
        'ComponentsFomular' => 'required'
    ];

    public function analysis() {
        return $this->belongsTo('App\Models\Analysis');
    }

    public function requirement() {
        return $this->hasOne('App\Models\Requirement', 'idComponents');
    }

    protected static function boot() {
       parent::boot();

        static::deleting(function($component) { // before delete() method call this
             $component ->requirement()->delete();
             // do the rest of the cleanup...
        });
    }
}
