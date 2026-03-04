<?php

namespace App\Helpers\DB\WithTranslation;

use App\Helpers\FileClassifierServiceHelper;
use Illuminate\Support\Facades\DB;
trait CreateHelper 
{
    use FileClassifierServiceHelper;
    public $translationRelationField;
    public $folderName;

    
    public function store(array $data)
    {
        return DB::transaction(function () use ($data) {
            
            $images = $this->classifier($data)["images"];

            foreach($images as $key => $image) {
                $data[$key] = $this->image_service->upload($data, $key, $this->folderName);
            } 

            $translationData = $data["translations"];
            unset($data["translations"]);
            $model = $this->model->create($data);
            foreach ($this->languageService->getWidthPagination() as $language) {
                $translation = [
                    "language_id" => $language->id,
                    $this->translationRelationField => $model->id
                ];


                foreach($translationData as $field => $value) {
                    $translation[$field] = $value[$language->id];
                }


                $this->translationModel::create($translation);
            }
            return $model->load("translations");
        });
    }
}
