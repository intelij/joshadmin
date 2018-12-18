<?php

namespace App\Repositories;

use App\Models\Analysis;
use InfyOm\Generator\Common\BaseRepository;

class AnalysisRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Analysis::class;
    }
}
