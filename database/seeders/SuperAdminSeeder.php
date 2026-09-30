<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::where('name', 'Super Admin')->first();

        User::updateOrCreate(
            [
                'email' => 'superadmin@example.com',
            ],
            [
                'role_id' => $role->id,
                'username' => 'super_admin',
                'name' => 'Super Admin',
                'password' => Hash::make('111111'),
                'status' => true,
            ]
        );
    }
}