<?php

namespace Database\Seeders;

use App\Models\SiteInfo\SiteInfo;
use App\Models\SiteInfo\SiteInfoTranslation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiteInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       SiteInfo::truncate();
       SiteInfoTranslation::truncate();
       $infos = [
            "header_logo_light_for_mode" => "header_logo_light_for_mode.svg",
            "header_logo_dark_for_mode" => "header_logo_dark_for_mode.svg",
            "footer_logo_light_for_mode" => "footer_logo_light_for_mode.svg",
            "footer_logo_dark_for_mode" => "footer_logo_dark_for_mode.svg",
            "favicon" => "favicon.svg",
            "translations" => [
                "header_logo_light_for_mode_alt_text" => [
                    1 => "header_logo_light_for_mode_alt_text_az",
                    2 => "header_logo_light_for_mode_alt_text_en",
                    3 => "header_logo_light_for_mode_alt_text_ru"
                ],
                "header_logo_dark_for_mode_alt_text" => [
                    1 => "header_logo_dark_for_mode_alt_text_az",
                    2 => "header_logo_dark_for_mode_alt_textt_en",
                    3 => "header_logo_dark_for_mode_alt_text_ru"
                ],
                "footer_logo_light_mode_alt_text" => [
                    1 => "footer_logo_light_mode_alt_text_az",
                    2 => "footer_logo_light_mode_alt_text_en",
                    3 => "footer_logo_light_mode_alt_text_ru"
                ],
                "footer_logo_dark_mode_alt_text" => [
                    1 => "footer_logo_dark_mode_alt_text_az",
                    2 => "footer_logo_dark_mode_alt_text_en",
                    3 => "footer_logo_dark_mode_alt_text_ru"
                ],
            ]


       ];

        $siteInfo = SiteInfo::create([
                "header_logo_light_for_mode" => $infos["header_logo_light_for_mode"],
                "header_logo_dark_for_mode" => $infos["header_logo_dark_for_mode"],
                "footer_logo_light_for_mode" => $infos["footer_logo_light_for_mode"],
                "footer_logo_dark_for_mode" => $infos["footer_logo_dark_for_mode"],
                "favicon" => $infos["favicon"],
        ]);

        foreach([1, 2, 3] as $languageId) {
            SiteInfoTranslation::create([
                "header_logo_light_for_mode_alt_text" => $infos["translations"]["header_logo_light_for_mode_alt_text"][$languageId],
                "header_logo_dark_for_mode_alt_text" => $infos["translations"]["header_logo_dark_for_mode_alt_text"][$languageId],
                "footer_logo_light_mode_alt_text" => $infos["translations"]["footer_logo_light_mode_alt_text"][$languageId],
                "footer_logo_dark_mode_alt_text" => $infos["translations"]["footer_logo_dark_mode_alt_text"][$languageId],
                "language_id" => $languageId,
                "site_info_id" => $siteInfo->id
            ]);
        }
        
    }
}
