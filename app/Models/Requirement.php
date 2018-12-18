<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;


class Requirement extends Model
{
    // use SoftDeletes;

    public $table = 'requirements';
    

    protected $dates = ['deleted_at'];

    protected $primaryKey = 'idRequirements';

    public $fillable = [
        'LOQ',
        'limit',
        'upperlimit',
        'comments',
        'score_value',
        'idAnalysis',
        'idRsl',
        'idComponents',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'LOQ' => 'string',
        'limit' => 'string',
        'upperlimit' => 'string',
        'comments' => 'string',
        'score_value' => 'string',
        'idAnalysis' => 'integer',
        'idRsl' => 'integer',
        'idComponents' => 'integer',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public function component() {
        return $this->hasOne('App\Model\Component');
    }
}
