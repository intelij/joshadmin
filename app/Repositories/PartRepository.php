<?php

namespace App\Repositories;

use App\Models\Part;
use InfyOm\Generator\Common\BaseRepository;

class PartRepository extends BaseRepository
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
        return Part::class;
    }
}
