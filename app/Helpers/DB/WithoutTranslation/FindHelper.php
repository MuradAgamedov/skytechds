<?php

namespace App\Helpers\DB\WithoutTranslation;

trait FindHelper 
{
    public function find($id, array $relations = []) {
        $query = $this->model::query();
        
        if (!empty($relations)) {
            $query->with($relations);
        }
        
        return $query->findOrFail($id);
    }
}
