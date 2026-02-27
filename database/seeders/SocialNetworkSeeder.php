<?php

namespace Database\Seeders;

use App\Models\SocialNetwork;
use Illuminate\Database\Seeder;

class SocialNetworkSeeder extends Seeder
{
    public function run(): void
    {
        SocialNetwork::truncate();

        $platforms = [
            "facebook",
            "twitter",
            "instagram",
            "youtube",
            "tiktok",
            "pinterest",
            "reddit",
            "telegram",
            "whatsapp",
            "discord",
            "threads",
            "twitch",
            "wechat"
        ];

        foreach ($platforms as $index => $platform) {
            SocialNetwork::create([
                "platform" => $platform,
                "order" => $index + 1,
                "status" => true,
                "url" => "https://{$platform}.com"
            ]);
        }
    }
}