<?php

namespace App\Repositories;

use App\Interfaces\Repositories\AboutRepositoryInterface;
use App\Models\About\About;
use App\Models\About\AboutTranslation;
use App\Models\SiteInfo\SiteInfo;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class AboutRepository implements AboutRepositoryInterface
{
    public function __construct(public About $model, public AboutTranslation $translationModel) {}
    public function getWidthPagination(array $with = [], int $limit = 60): LengthAwarePaginator
    {
        return $this->model::with($with)->paginate($limit);
    }
   
    public function update(About $about, array $data): About
    {
        return DB::transaction(function () use ($about, $data) {
            $aboutTranslationData = $data["translations"];
            unset($data["translations"]);
            $about->update($data);
            $existingTranslations = $about->translations()->get()->keyBy("language_id");

            foreach ($aboutTranslationData as $field  => $values) {
                foreach ($values as $languageId => $value) {

                    if (isset($existingTranslations[$languageId])) {
                        $existingTranslations[$languageId]->update([
                            $field => $value,
                        ]);
                    }
                }
            }
            $about->refresh();

            return $about->load("translations");
        });
    }

  
    public function first():About
    {
        return $this->model::with("translations")->first();
    }
}
