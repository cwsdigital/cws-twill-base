<?php

namespace App\Repositories;

use A17\Twill\Repositories\Behaviors\HandleFiles;
use A17\Twill\Repositories\ModuleRepository;
use App\Models\Enquiry;
use App\Repositories\Behaviours\HandleEnquiries;

class EnquiryRepository extends ModuleRepository
{
    use HandleFiles,
        HandleEnquiries;

    public function __construct(Enquiry $model)
    {
        $this->model = $model;
    }
}
