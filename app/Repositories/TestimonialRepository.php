<?php

namespace App\Repositories;

use App\Interfaces\Repositories\TestimonialRepositoryInterface;
use App\Models\Testimonial\Testimonial;
use App\Models\Testimonial\TestimonialTranslation;
use App\Services\LanguageService;
use App\Support\ImageService;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class TestimonialRepository implements TestimonialRepositoryInterface
{
    public function __construct(public Testimonial $model, public TestimonialTranslation $translationModel, public LanguageService $languageService, public ImageService $image_service) {}
    public function getWidthPagination(array $with = [], int $limit = 60): LengthAwarePaginator
    {
        return $this->model::with($with)->paginate($limit);
    }
    public function store(array $data): Testimonial
    {
        return DB::transaction(function () use ($data) {
            $translationData = $data["translations"];
            unset($data["translations"]);
            $data["photo"] = $this->image_service->upload($data, "photo", "testimonials");
            $model = $this->model->create($data);
            foreach ($this->languageService->getWidthPagination() as $language) {
                $this->translationModel::create([
                    "full_name" => $translationData["full_name"][$language->id] ?? null,
                    "company" => $translationData["company"][$language->id] ?? null,
                    "position" => $translationData["position"][$language->id] ?? null,
                    "language_id" => $language->id,
                    "testimonial_id" => $model->id
                ]);
            }
            return $model->load("translations");
        });
    }


    public function update(Testimonial $model, array $data): Testimonial
    {
        return DB::transaction(function () use ($model, $data) {
            $testimonialTranslationData = $data["translations"];
            unset($data["translations"]);
            $data["photo"] = $this->image_service->update($model, $data, "photo", "testimonials");
            $model->update($data);
            $existingTranslations = $model->translations()->get()->keyBy("language_id");

            foreach ($testimonialTranslationData as $field  => $values) {
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

    public function destroy(Testimonial $model): Testimonial
    {
        $model->load("translations");
        $model->delete();
        return $model;
    }
    public function find(Testimonial $model)
    {
        $model->load("translations");
        return $model;
    }
}
