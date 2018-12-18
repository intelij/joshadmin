<?php

namespace App\Repositories;

use App\Models\DepartmentCompany;
use InfyOm\Generator\Common\BaseRepository;

class DepartmentCompanyRepository extends BaseRepository
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
        return DepartmentCompany::class;
    }
}
