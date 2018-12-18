<?php

namespace App\Repositories;

use App\Models\Report;
use InfyOm\Generator\Common\BaseRepository;

class ReportRepository extends BaseRepository
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
        return Report::class;
    }
}
