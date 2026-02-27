<?php

namespace Database\Seeders;

use App\Models\Email;
use Illuminate\Database\Seeder;

class EmailSeeder extends Seeder
{
    public function run(): void
    {
        Email::insert([
            ["email" => "info@example.com", "order" => 1, "status" => true],
            ["email" => "support@example.com", "order" => 2, "status" => true],
            ["email" => "contact@example.com", "order" => 3, "status" => true],
            ["email" => "sales@example.com", "order" => 4, "status" => true],
            ["email" => "admin@example.com", "order" => 5, "status" => true],
            ["email" => "hr@example.com", "order" => 6, "status" => true],
            ["email" => "marketing@example.com", "order" => 7, "status" => true],
            ["email" => "hello@example.com", "order" => 8, "status" => true],
            ["email" => "team@example.com", "order" => 9, "status" => true],
            ["email" => "office@example.com", "order" => 10, "status" => true],
        ]);
    }
}