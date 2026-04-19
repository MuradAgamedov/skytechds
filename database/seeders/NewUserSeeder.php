<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class NewUserSeeder extends Seeder
{
    public function run(): void
    {
        User::query()->update([
            'password' => Hash::make('12345678'),
        ]);
    }
}
