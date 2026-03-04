<?php

namespace App\Repositories;

use App\Interfaces\Repositories\AddressRepositoryInterface;
use App\Models\Address\Address;
use App\Models\Address\AddressTranslation;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class AddressRepository implements AddressRepositoryInterface
{
    public function __construct(public Address $model, public AddressTranslation $translationModel) {}
    public function getWidthPagination(array $with = [], int $limit = 60): LengthAwarePaginator
    {
        return $this->model::with($with)->paginate($limit);
    }
    public function store(array $data): Address
    {
        return DB::transaction(function () use ($data) {
            $translationData = $data["translations"];
            unset($data["translations"]);
            $model = $this->model->create($data);
            foreach ($translationData as $field  => $values) {
                foreach ($values as $languageId  => $value) {
                    $this->translationModel::create([
                        $field => $value,
                        "language_id" => $languageId,
                        "address_id" => $model->id
                    ]);
                }
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
