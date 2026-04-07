<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::truncate();

        // Create Murad user with admin role
        $admin = User::create([
            'name' => "Murad",
            "email" => "agamedov94@mail.ru",
            'password' => Hash::make("admin123")
        ]);

        // Create or get admin role
        $adminRole = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'sanctum']);
        
        // Get all permissions and assign to admin role
        $allPermissions = Permission::all();
        $adminRole->givePermissionTo($allPermissions);
        
        // Assign admin role to Murad user
        $admin->assignRole($adminRole);
        
        // Also give direct permissions to user (backup)
        $admin->givePermissionTo($allPermissions);

        // Give admin role to ALL existing users
        $allUsers = User::all();
        foreach ($allUsers as $user) {
            $user->assignRole($adminRole);
            $user->givePermissionTo($allPermissions);
        }
        
        $this->command->info('Admin role and all permissions assigned to ALL users successfully.');
    }
}
