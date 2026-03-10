<?php

namespace App\Helpers\DB\WithoutTranslation;



trait CreateHelper 
{
    public function store(array $data)
    {
        $syncRelations = array_filter(
            $data,
            fn($element) => is_array($element)
        );

        $model = $this->model::create($data);
            foreach ($syncRelations as $field => $values) {

            if (!method_exists($model, $field)) {
                continue;
            }

            $relation = $model->{$field}();

            if (method_exists($model, 'sync' . ucfirst($field))) {
                $method = 'sync' . ucfirst($field);
                $model->$method($values);
            } elseif (method_exists($relation, 'sync')) {
                $relation->sync($values);
            }
            }

        return $model->loadMissing(array_keys($syncRelations));
    }
}

