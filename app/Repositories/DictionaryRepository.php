<?php

namespace App\Repositories;

use App\Interfaces\Repositories\AddressRepositoryInterface;
use App\Interfaces\Repositories\DictionaryRepositoryInterface;

use App\Models\Dictionary\Dictionary;
use App\Models\Dictionary\DictionaryTranslation;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class DictionaryRepository implements DictionaryRepositoryInterface{
    public function __construct(public Dictionary $model, public DictionaryTranslation $translationModel)
    {
    }
    public function getWidthPagination(array $with = [], int $limit = 60):LengthAwarePaginator {
        return $this->model::with($with)->paginate($limit);
    }
    public function store(array $data):Dictionary {
        return DB::transaction(function() use ($data) {
            $dictionaryTranslationData = $data["translations"];
            unset($data["translations"]);
            $dictionary = $this->model->create($data);
            foreach($dictionaryTranslationData as $field  => $values){
                foreach($values as $languageId  => $value) {

                    $this->translationModel::create([
                        $field => $value,
                        "language_id" => $languageId,
                        "dictionary_id" => $dictionary->id
                    ]);
                }
            }
            
            return $dictionary->load("translations");
        });
    }
    public function update(Dictionary $dictionary, array $data):Dictionary {
        return DB::transaction(function() use ($dictionary, $data) {
            $dictionaryTranslationData = $data["translations"];
            unset($data["translations"]);
            $dictionary->update($data);
            $existingTranslations = $dictionary->translations()->get()->keyBy("language_id");

            foreach($dictionaryTranslationData as $field  => $values){
                    foreach($values as $languageId => $value) {
             
                        if(isset($existingTranslations[$languageId])) {
                            $existingTranslations[$languageId]->update([
                                $field => $value,
                            ]);
                        }
                      
                    }
                }
                $dictionary->refresh();

                return $dictionary->load("translations");
        });
    }   

    public function destroy(Dictionary $dictionary):Dictionary {
        $dictionary->load("translations");
        $dictionary->delete();
        return $dictionary;
    }
    public function find(Dictionary $dictionary) {
        return $dictionary;
    }
}