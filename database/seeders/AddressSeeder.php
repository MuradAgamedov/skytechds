<?php

namespace Database\Seeders;

use App\Models\Address\Address;
use App\Models\Address\AddressTranslation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Address::truncate();
        AddressTranslation::truncate();
        $addresses = [
        [
            "translations" => [
                "address" => [
                    "3" => "address-az-1",
                    "4" => "address-ru-1",
                    "5" => "address-en-1",
                ]
            ]
        ],
        [
            "translations" => [
                "address" => [
                    "3" => "address-az-2",
                    "4" => "address-ru-2",
                    "5" => "address-en-2",
                ]
            ]
        ],
        [
            "translations" => [
                "address" => [
                    "3" => "address-az-3",
                    "4" => "address-ru-3",
                    "5" => "address-en-3",
                ]
            ]
        ],
        [
            "translations" => [
                "address" => [
                    "3" => "address-az-4",
                    "4" => "address-ru-4",
                    "5" => "address-en-4",
                ]
            ]
        ],
        [
            "translations" => [
                "address" => [
                    "3" => "address-az-5",
                    "4" => "address-ru-5",
                    "5" => "address-en-5",
                ]
            ]
        ],
        [
            "translations" => [
                "address" => [
                    "3" => "address-az-6",
                    "4" => "address-ru-6",
                    "5" => "address-en-6",
                ]
            ]
        ],
        [
            "translations" => [
                "address" => [
                    "3" => "address-az-7",
                    "4" => "address-ru-7",
                    "5" => "address-en-7",
                ]
            ]
        ],
        [
            "translations" => [
                "address" => [
                    "3" => "address-az-8",
                    "4" => "address-ru-8",
                    "5" => "address-en-8",
                ]
            ]
        ],
        [
            "translations" => [
                "address" => [
                    "3" => "address-az-9",
                    "4" => "address-ru-9",
                    "5" => "address-en-9",
                ]
            ]
        ],
        [
            "translations" => [
                "address" => [
                    "3" => "address-az-10",
                    "4" => "address-ru-10",
                    "5" => "address-en-10",
                ]
            ]
        ],
    ];

       DB::transaction(function() use ($addresses) {
         foreach($addresses as $index => $address) {
            $createdAddress = Address::create([
                "status" => true,
                "order" => $index + 1
            ]);
            foreach($address["translations"]["address"] as $languageId => $value) {
                AddressTranslation::create([
                    "language_id" => $languageId,
                    "address" => $value,
                    "address_id" => $createdAddress->id
                ]);
            }
        }
       });

    }
}
