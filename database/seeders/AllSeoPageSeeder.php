<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AllSeo;

class AllSeoPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AllSeo::create([
            'is_indexed' => true,
            'is_followed' => true,
            'meta_header' => '',
            'meta_footer' => '',
        ]);
    }
}
