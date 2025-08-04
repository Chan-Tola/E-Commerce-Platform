<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            $roles = [
                [
                    Role::NAME => 'admin',
                    Role::CREATED_AT => now(), //catch current-time
                    Role::UPDATED_AT => now(), //catch current-time
                ],
                [
                    Role::NAME => 'staff',
                    Role::CREATED_AT => now(), //catch current-time
                    Role::UPDATED_AT => now(), //catch current-time
                ]
            ];
        Role::insert([
            $roles
        ]);
    }
}
