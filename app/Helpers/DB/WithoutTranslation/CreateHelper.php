<?php

namespace App\Helpers\DB\WithoutTranslation;

use Illuminate\Database\Eloquent\Model;


trait CreateHelper 
{

    
    public function store(array $data) {
        return $this->model::create($data);
    }

  
}
