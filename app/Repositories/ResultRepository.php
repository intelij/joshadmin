<?php

namespace App\Repositories;

use App\Models\Result;
use InfyOm\Generator\Common\BaseRepository;

class ResultRepository extends BaseRepository
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
        return Result::class;
    }
}
