<?php

namespace App\Helpers\DB\WithoutTranslation;

trait FindHelper 
{
    public function find($id) {
       return $this->model::findOrFail($id);
    }
}
