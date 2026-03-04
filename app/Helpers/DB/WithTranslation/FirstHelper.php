<?php

namespace App\Helpers\DB\WithTranslation;


trait FirstHelper 
{
    public function first()
    {

        return $this->model::with("translations")->first();
    }
}
