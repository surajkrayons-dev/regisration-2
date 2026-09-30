<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::updateOrCreate(
            ['name' => 'Super Admin'],
            [
                'permissions' => null,
                'is_delete_allowed' => true,
                'status' => true,
            ]
        );

        Role::updateOrCreate(
            ['name' => 'Admin'],
            [
                'permissions' => [],
                'is_delete_allowed' => true,
                'status' => true,
            ]
        );

        Role::updateOrCreate(
            ['name' => 'Employee'],
            [
                'permissions' => [],
                'is_delete_allowed' => false,
                'status' => true,
            ]
        );

        Role::updateOrCreate(
            ['name' => 'Sub Employee'],
            [
                'permissions' => [],
                'is_delete_allowed' => false,
                'status' => true,
            ]
        );
    }
}