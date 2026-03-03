<?php

namespace App\Repositories;

use App\Interfaces\Repositories\SiteInfoRepositoryInterface;
use App\Models\SiteInfo\SiteInfo;
use App\Models\SiteInfo\SiteInfoTranslation;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class SiteInfoRepository implements SiteInfoRepositoryInterface
{
    public function __construct(public SiteInfo $model, public SiteInfoTranslation $translationModel) {}
    public function getWidthPagination(array $with = [], int $limit = 60): LengthAwarePaginator
    {
        return $this->model::with($with)->paginate($limit);
    }
   
    public function update(SiteInfo $address, array $data): SiteInfo
    {
        return DB::transaction(function () use ($address, $data) {
            $addressTranslationData = $data["translations"];
            unset($data["translations"]);
            $address->update($data);
            $existingTranslations = $address->translations()->get()->keyBy("language_id");

            foreach ($addressTranslationData as $field  => $values) {
                foreach ($values as $languageId => $value) {

                    if (isset($existingTranslations[$languageId])) {
                        $existingTranslations[$languageId]->update([
                            $field => $value,
                        ]);
                    }
                }
            }
            $address->refresh();

            return $address->load("translations");
        });
    }

  
    public function first():SiteInfo
    {
        return $this->model::first();
    }
}
