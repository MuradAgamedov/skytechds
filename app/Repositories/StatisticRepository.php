<?php

namespace App\Repositories;

use App\Interfaces\Repositories\StatisticRepositoryInterface;
use App\Models\BlogCategory\BlogCategory;
use App\Models\Statistics\Statistic;
use App\Models\Statistics\StatisticTranslation;
use App\Services\LanguageService;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class StatisticRepository implements StatisticRepositoryInterface
{
    public function __construct(public Statistic $model, public StatisticTranslation $translationModel, public LanguageService $languageService) {}
    public function getWidthPagination(array $with = [], int $limit = 60): LengthAwarePaginator
    {
        return $this->model::with($with)->paginate($limit);
    }
    public function store(array $data): Statistic
    {
        return DB::transaction(function () use ($data) {
            $translationData = $data["translations"];
            unset($data["translations"]);
            $model = $this->model->create($data);
            foreach ($this->languageService->getWidthPagination() as $language) {
                $this->translationModel::create([
                    "title" => $translationData["title"][$language->id] ?? null,
                    "subtitle" => $translationData["subtitle"][$language->id] ?? null,
                    "icon_alt_text" => $translationData["icon_alt_text"][$language->id] ?? null,
                    "language_id" => $language->id,
                    "statistic_id" => $model->id
                ]);
            }
            return $model->load("translations");
        });
    }
    public function update(Statistic $model, array $data): Statistic
    {
        return DB::transaction(function () use ($model, $data) {
            $translationData = $data["translations"];
            unset($data["translations"]);
            $model->update($data);
            $existingTranslations = $model->translations()->get()->keyBy("language_id");

            foreach ($translationData as $field  => $values) {
                foreach ($values as $languageId => $value) {

                    if (isset($existingTranslations[$languageId])) {
                        $existingTranslations[$languageId]->update([
                            $field => $value,
                        ]);
                    }
                }
            }
            $model->refresh();

            return $model->load("translations");
        });
    }

    public function destroy(Statistic $model): Statistic
    {
        $model->load("translations");
        $model->delete();
        return $model;
    }
    public function find(Statistic $model)
    {
        $model->load("translations");
        return $model;
    }
}
