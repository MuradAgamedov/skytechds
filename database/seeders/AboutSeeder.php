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
                    3 => "image_alt_az",
                    4 => "image_alt_en",
                    5 => "image_alt_ru"
                ],
                "text" => [
                    3 => "text_az",
                    4 => "text_en",
                    5 => "text_ru"
                ]
            ]


       ];

        $about = About::create([
            "image" => $datas["image"]
        ]);

        foreach([3, 4, 5] as $languageId) {
            AboutTranslation::create([
                "image_alt_text" => $datas["translations"]["image_alt_text"][$languageId],
                "text" => $datas["translations"]["text"][$languageId],
                "language_id" => $languageId,
                "about_id" => $about->id
            ]);
        }
        
    }
}
