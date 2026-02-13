<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement("
            INSERT INTO users (name, email, role, company_id, password, created_at, updated_at)
            VALUES (
                'Super Admin',
                'superadmin@test.com',
                'SuperAdmin',
                NULL,
                '".Hash::make('password')."',
                NOW(),
                NOW()
            )
        ");
    }
}
