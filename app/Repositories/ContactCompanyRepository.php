<?php

namespace App\Repositories;

use App\Models\ContactCompany;
use InfyOm\Generator\Common\BaseRepository;

class ContactCompanyRepository extends BaseRepository
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
        return ContactCompany::class;
    }
}
