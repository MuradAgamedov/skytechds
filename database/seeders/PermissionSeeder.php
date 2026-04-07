<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing permissions and roles completely
        Permission::query()->delete();
        Role::query()->delete();
        
        // Reset auto-increment
        DB::table('permissions')->truncate();
        DB::table('roles')->truncate();
        DB::table('role_has_permissions')->truncate();
        DB::table('model_has_permissions')->truncate();
        DB::table('model_has_roles')->truncate();

        // Create permissions
        $permissions = [
            ['name' => 'admin.read', 'guard_name' => 'sanctum'],
            ['name' => 'admin.create', 'guard_name' => 'sanctum'],
            ['name' => 'admin.update', 'guard_name' => 'sanctum'],
            ['name' => 'admin.delete', 'guard_name' => 'sanctum'],
            ['name' => 'user.read', 'guard_name' => 'sanctum'],
            ['name' => 'user.create', 'guard_name' => 'sanctum'],
            ['name' => 'user.update', 'guard_name' => 'sanctum'],
            ['name' => 'user.delete', 'guard_name' => 'sanctum'],
            ['name' => 'blog.read', 'guard_name' => 'sanctum'],
            ['name' => 'blog.create', 'guard_name' => 'sanctum'],
            ['name' => 'blog.update', 'guard_name' => 'sanctum'],
            ['name' => 'blog.delete', 'guard_name' => 'sanctum'],
            ['name' => 'page.read', 'guard_name' => 'sanctum'],
            ['name' => 'page.create', 'guard_name' => 'sanctum'],
            ['name' => 'page.update', 'guard_name' => 'sanctum'],
            ['name' => 'page.delete', 'guard_name' => 'sanctum'],
            ['name' => 'service.read', 'guard_name' => 'sanctum'],
            ['name' => 'service.create', 'guard_name' => 'sanctum'],
            ['name' => 'service.update', 'guard_name' => 'sanctum'],
            ['name' => 'service.delete', 'guard_name' => 'sanctum'],
            ['name' => 'about.read', 'guard_name' => 'sanctum'],
            ['name' => 'about.create', 'guard_name' => 'sanctum'],
            ['name' => 'about.update', 'guard_name' => 'sanctum'],
            ['name' => 'about.delete', 'guard_name' => 'sanctum'],
            ['name' => 'faq.read', 'guard_name' => 'sanctum'],
            ['name' => 'faq.create', 'guard_name' => 'sanctum'],
            ['name' => 'faq.update', 'guard_name' => 'sanctum'],
            ['name' => 'faq.delete', 'guard_name' => 'sanctum'],
            ['name' => 'portfolio.read', 'guard_name' => 'sanctum'],
            ['name' => 'portfolio.create', 'guard_name' => 'sanctum'],
            ['name' => 'portfolio.update', 'guard_name' => 'sanctum'],
            ['name' => 'portfolio.delete', 'guard_name' => 'sanctum'],
            ['name' => 'testimonial.read', 'guard_name' => 'sanctum'],
            ['name' => 'testimonial.create', 'guard_name' => 'sanctum'],
            ['name' => 'testimonial.update', 'guard_name' => 'sanctum'],
            ['name' => 'testimonial.delete', 'guard_name' => 'sanctum'],
            ['name' => 'team.read', 'guard_name' => 'sanctum'],
            ['name' => 'team.create', 'guard_name' => 'sanctum'],
            ['name' => 'team.update', 'guard_name' => 'sanctum'],
            ['name' => 'team.delete', 'guard_name' => 'sanctum'],
            ['name' => 'statistic.read', 'guard_name' => 'sanctum'],
            ['name' => 'statistic.create', 'guard_name' => 'sanctum'],
            ['name' => 'statistic.update', 'guard_name' => 'sanctum'],
            ['name' => 'statistic.delete', 'guard_name' => 'sanctum'],
            ['name' => 'socialnetwork.read', 'guard_name' => 'sanctum'],
            ['name' => 'socialnetwork.create', 'guard_name' => 'sanctum'],
            ['name' => 'socialnetwork.update', 'guard_name' => 'sanctum'],
            ['name' => 'socialnetwork.delete', 'guard_name' => 'sanctum'],
            ['name' => 'siteinfo.read', 'guard_name' => 'sanctum'],
            ['name' => 'siteinfo.create', 'guard_name' => 'sanctum'],
            ['name' => 'siteinfo.update', 'guard_name' => 'sanctum'],
            ['name' => 'siteinfo.delete', 'guard_name' => 'sanctum'],
            ['name' => 'tag.read', 'guard_name' => 'sanctum'],
            ['name' => 'tag.create', 'guard_name' => 'sanctum'],
            ['name' => 'tag.update', 'guard_name' => 'sanctum'],
            ['name' => 'tag.delete', 'guard_name' => 'sanctum'],
            ['name' => 'permission.read', 'guard_name' => 'sanctum'],
            ['name' => 'permission.create', 'guard_name' => 'sanctum'],
            ['name' => 'permission.update', 'guard_name' => 'sanctum'],
            ['name' => 'permission.delete', 'guard_name' => 'sanctum'],
            ['name' => 'role.read', 'guard_name' => 'sanctum'],
            ['name' => 'role.create', 'guard_name' => 'sanctum'],
            ['name' => 'role.update', 'guard_name' => 'sanctum'],
            ['name' => 'role.delete', 'guard_name' => 'sanctum'],
            ['name' => 'address.read', 'guard_name' => 'sanctum'],
            ['name' => 'address.create', 'guard_name' => 'sanctum'],
            ['name' => 'address.update', 'guard_name' => 'sanctum'],
            ['name' => 'address.delete', 'guard_name' => 'sanctum'],
            ['name' => 'email.read', 'guard_name' => 'sanctum'],
            ['name' => 'email.create', 'guard_name' => 'sanctum'],
            ['name' => 'email.update', 'guard_name' => 'sanctum'],
            ['name' => 'email.delete', 'guard_name' => 'sanctum'],
            ['name' => 'map.read', 'guard_name' => 'sanctum'],
            ['name' => 'map.create', 'guard_name' => 'sanctum'],
            ['name' => 'map.update', 'guard_name' => 'sanctum'],
            ['name' => 'map.delete', 'guard_name' => 'sanctum'],
            ['name' => 'language.read', 'guard_name' => 'sanctum'],
            ['name' => 'language.create', 'guard_name' => 'sanctum'],
            ['name' => 'language.update', 'guard_name' => 'sanctum'],
            ['name' => 'language.delete', 'guard_name' => 'sanctum'],
            ['name' => 'dictionary.read', 'guard_name' => 'sanctum'],
            ['name' => 'dictionary.create', 'guard_name' => 'sanctum'],
            ['name' => 'dictionary.update', 'guard_name' => 'sanctum'],
            ['name' => 'dictionary.delete', 'guard_name' => 'sanctum'],
            ['name' => 'blogcategory.read', 'guard_name' => 'sanctum'],
            ['name' => 'blogcategory.create', 'guard_name' => 'sanctum'],
            ['name' => 'blogcategory.update', 'guard_name' => 'sanctum'],
            ['name' => 'blogcategory.delete', 'guard_name' => 'sanctum'],
            ['name' => 'allseo.read', 'guard_name' => 'sanctum'],
            ['name' => 'allseo.create', 'guard_name' => 'sanctum'],
            ['name' => 'allseo.update', 'guard_name' => 'sanctum'],
            ['name' => 'allseo.delete', 'guard_name' => 'sanctum'],
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate($permission);
        }

        // Create admin role and give all permissions
        $adminRole = Role::create(['name' => 'admin', 'guard_name' => 'sanctum']);
        
        // Get all permissions and assign to admin role
        $allPermissions = Permission::all();
        $adminRole->givePermissionTo($allPermissions);

        // Create user role and give read permissions only
        $userRole = Role::create(['name' => 'user', 'guard_name' => 'sanctum']);
        $userPermissions = Permission::where('name', 'like', '%.read')->get();
        $userRole->givePermissionTo($userPermissions);

        // Give admin role to ALL users
        $allUsers = \App\Models\User::all();
        foreach ($allUsers as $user) {
            $user->assignRole($adminRole);
        }
        
        $this->command->info('Admin role assigned to ALL users successfully.');
    }
}
