<?php

namespace Database\Seeders;

use App\Models\About\About;
use App\Models\About\AboutTranslation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       About::truncate();
       AboutTranslation::truncate();
       $datas = [
            "image" => "header_logo_light_for_mode.svg",
            "translations" => [
                "image_alt_text" => [
                    1 => "image_alt_az",
                    2 => "image_alt_en",
                    3 => "image_alt_ru"
                ],
                "text" => [
                    1 => "text_az",
                    2 => "text_en",
                    3 => "text_ru"
                ]
            ]


       ];

        $about = About::create([
            "image" => $datas["image"]
        ]);

        foreach([1, 2, 3] as $languageId) {
            AboutTranslation::create([
                "image_alt_text" => $datas["translations"]["image_alt_text"][$languageId],
                "text" => $datas["translations"]["text"][$languageId],
                "language_id" => $languageId,
                "about_id" => $about->id
            ]);
        }

    }
}
