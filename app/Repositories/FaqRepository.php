<?php

namespace App\Repositories;

use App\Interfaces\Repositories\FaqRepositoryInterface;
use App\Models\Faq\Faq;
use App\Models\Faq\FaqTranslation;
use App\Services\LanguageService;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class FaqRepository implements FaqRepositoryInterface
{
    public function __construct(public Faq $model, public FaqTranslation $translationModel, public LanguageService $languageService) {}
    public function getWidthPagination(array $with = [], int $limit = 60): LengthAwarePaginator
    {
        return $this->model::with($with)->paginate($limit);
    }
    public function store(array $data)
    {
        return DB::transaction(function () use ($data) {
            $translationData = $data["translations"];
            unset($data["translations"]);
            $model = $this->model->create($data);
            foreach ($this->languageService->getWidthPagination() as $language) {

                $this->translationModel::create([
                    "question" => $translationData["question"][$language->id] ?? null,
                    "answer" => $translationData["answer"][$language->id] ?? null,
                    "language_id" => $language->id,
                    "faq_id" => $model->id
                ]);
            }
            return $model->load("translations");
        });
    }
    public function update($model, array $data)
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

    public function destroy($model)
    {
        $model->load("translations");
        $model->delete();
        return $model;
    }
    public function find($model)
    {
        $model->load("translations");
        return $model;
    }
}
