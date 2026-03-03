<?php

namespace App\Repositories;

use App\Interfaces\Repositories\PortfolioRepositoryInterface;
use App\Models\BlogCategory\BlogCategory;
use App\Models\BlogCategory\BlogCategoryTranslation;
use App\Models\Portfolio\Portfolio;
use App\Models\Portfolio\PortfolioTranslation;
use App\Services\LanguageService;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class PortfolioRepository implements PortfolioRepositoryInterface
{
    public function __construct(public Portfolio $model, public PortfolioTranslation $translationModel, public LanguageService $languageService) {}
    public function getWidthPagination(array $with = [], int $limit = 60): LengthAwarePaginator
    {
        return $this->model::with($with)->paginate($limit);
    }
    public function store(array $data): Portfolio
    {
        return DB::transaction(function () use ($data) {
            $translationData = $data["translations"];
            unset($data["translations"]);
            $model = $this->model->create($data);
            foreach ($this->languageService->getWidthPagination() as $language) {
                $this->translationModel::create([
                    "title" => $translationData["title"][$language->id] ?? null,
                    "language_id" => $language->id,
                    "portfolio_id" => $model->id
                ]);
            }
            return $model->load("translations");
        });
    }
    public function update(Portfolio $model, array $data): Portfolio
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

    public function destroy(Portfolio $model): Portfolio
    {
        $model->load("translations");
        $model->delete();
        return $model;
    }
    public function find(Portfolio $model)
    {
        $model->load("translations");
        return $model;
    }

}
