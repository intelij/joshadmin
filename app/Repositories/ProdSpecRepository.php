<?php

namespace App\Repositories;

use App\Models\ProdSpec;
use InfyOm\Generator\Common\BaseRepository;

class ProdSpecRepository extends BaseRepository
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
        return ProdSpec::class;
    }
}
