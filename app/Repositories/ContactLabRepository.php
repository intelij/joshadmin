<?php

namespace App\Repositories;

use App\Models\ContactLab;
use InfyOm\Generator\Common\BaseRepository;

class ContactLabRepository extends BaseRepository
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
        return ContactLab::class;
    }
}
