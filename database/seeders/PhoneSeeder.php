<?php

namespace Database\Seeders;

use App\Models\Phone;
use Illuminate\Database\Seeder;

class PhoneSeeder extends Seeder
{
    public function run(): void
    {
        Phone::truncate();
        Phone::insert([
            [
                "phone" => "0501111111",
                "order" => 1,
                "status" => true
            ],
            [
                "phone" => "0502222222",
                "order" => 2,
                "status" => true
            ],
            [
                "phone" => "0503333333",
                "order" => 3,
                "status" => true
            ],
            [
                "phone" => "0504444444",
                "order" => 4,
                "status" => true
            ],
            [
                "phone" => "0505555555",
                "order" => 5,
                "status" => true
            ],
            [
                "phone" => "0506666666",
                "order" => 6,
                "status" => true
            ],
            [
                "phone" => "0507777777",
                "order" => 7,
                "status" => true
            ],
            [
                "phone" => "0508888888",
                "order" => 8,
                "status" => true
            ],
            [
                "phone" => "0509999999",
                "order" => 9,
                "status" => true
            ],
            [
                "phone" => "0510000000",
                "order" => 10,
                "status" => true
            ],
        ]);
    }
}