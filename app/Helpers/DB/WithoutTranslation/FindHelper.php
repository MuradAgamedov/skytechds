<?php

namespace App\Helpers\DB\WithoutTranslation;

use Illuminate\Database\Eloquent\Model;


trait FindHelper 
{

    public function find($model) {
        return $model;
    }
   
  
}
