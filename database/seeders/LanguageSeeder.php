<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    public function run(): void
    {
        Language::truncate();
        Language::insert([
            [
                "title" => "Azərbaycan",
                "lang_code" => "az",
                "order" => 1,
                "status" => true,
                "is_default" => true
            ],
            [
                "title" => "English",
                "lang_code" => "en",
                "order" => 2,
                "status" => true,
                "is_default" => false
            ],
            [
                "title" => "Русский",
                "lang_code" => "ru",
                "order" => 3,
                "status" => true,
                "is_default" => false
            ],
        ]);
    }
}