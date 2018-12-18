<?php

namespace App\Repositories;

use App\Models\RSL;
use InfyOm\Generator\Common\BaseRepository;

class RSLRepository extends BaseRepository
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
        return RSL::class;
    }
}
