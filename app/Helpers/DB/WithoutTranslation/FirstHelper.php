<?php

namespace App\Helpers\DB\WithoutTranslation;


trait FirstHelper 
{
    public function first()
    {
        return $this->model->first();
    }
}
