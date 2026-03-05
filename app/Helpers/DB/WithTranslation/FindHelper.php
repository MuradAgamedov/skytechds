<?php

namespace App\Helpers\DB\WithTranslation;


trait FindHelper 
{
    public function find($id, array $relations = [])
    {
        $defaultRelations = ['translations'];
        $allRelations = array_merge($defaultRelations, $relations);
        
        $model = $this->model::findOrFail($id);
        $model->loadMissing($allRelations);
        return $model;
    }
}
