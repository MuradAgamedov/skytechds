<?php

namespace App\Repositories;

use App\Helpers\DB\WithTranslation\ReadHelper;
use App\Helpers\DB\WithTranslation\UpdateHelper;
use App\Helpers\DB\WithTranslation\FirstHelper;

use App\Interfaces\Repositories\AboutRepositoryInterface;
use App\Models\About\About;
use App\Models\About\AboutTranslation;


class AboutRepository implements AboutRepositoryInterface
{
    use ReadHelper, UpdateHelper, FirstHelper;
    public function __construct(public About $model, public AboutTranslation $translationModel) {}
    

 
   
  
}
