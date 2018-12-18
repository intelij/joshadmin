<?php

namespace App\Repositories;

use App\Models\Component;
use InfyOm\Generator\Common\BaseRepository;

class ComponentRepository extends BaseRepository
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
        return Component::class;
    }
}
