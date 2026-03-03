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
            $addressTranslationData = $data["translations"];
            unset($data["translations"]);
            $address = $this->model->create($data);
            foreach ($addressTranslationData as $field  => $values) {
                foreach ($values as $languageId  => $value) {
                    $this->translationModel::create([
                        $field => $value,
                        "language_id" => $languageId,
                        "address_id" => $address->id
                    ]);
                }
            }

            return $address->load("translations");
        });
    }
    public function update(Address $address, array $data): Address
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

    public function destroy(Address $address): Address
    {
        $address->load("translations");
        $address->delete();
        return $address;
    }
    public function find(Address $address)
    {
        $address->load("translations");
        return $address;
    }
}
