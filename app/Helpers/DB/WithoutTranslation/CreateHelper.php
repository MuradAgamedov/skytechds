<?php

namespace App\Helpers\DB\WithoutTranslation;



trait CreateHelper 
{

    
    public function store(array $data) {
        return $this->model::create($data);
    }

  
}
