<?php

namespace App\Repositories;

use App\Models\Metadata;
use InfyOm\Generator\Common\BaseRepository;

class MetadataRepository extends BaseRepository
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
        return Metadata::class;
    }
}
