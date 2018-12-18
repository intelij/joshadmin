<?php

namespace App\Repositories;

use App\Models\Lab;
use InfyOm\Generator\Common\BaseRepository;

class LabRepository extends BaseRepository
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
        return Lab::class;
    }
}
