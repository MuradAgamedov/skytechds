<?php

namespace Database\Seeders;

use App\Models\Map;
use Illuminate\Database\Seeder;

class MapSeeder extends Seeder
{
    public function run(): void
    {
        Map::insert([
            ["map" => "https://maps.google.com/?q=Baku", "order" => 1, "status" => true],
            ["map" => "https://maps.google.com/?q=Ganja", "order" => 2, "status" => true],
            ["map" => "https://maps.google.com/?q=Sumqayit", "order" => 3, "status" => true],
            ["map" => "https://maps.google.com/?q=Shaki", "order" => 4, "status" => true],
            ["map" => "https://maps.google.com/?q=Lankaran", "order" => 5, "status" => true],
            ["map" => "https://maps.google.com/?q=Quba", "order" => 6, "status" => true],
            ["map" => "https://maps.google.com/?q=Mingachevir", "order" => 7, "status" => true],
            ["map" => "https://maps.google.com/?q=Nakhchivan", "order" => 8, "status" => true],
            ["map" => "https://maps.google.com/?q=Shamakhi", "order" => 9, "status" => true],
            ["map" => "https://maps.google.com/?q=Zaqatala", "order" => 10, "status" => true],
        ]);
    }
}