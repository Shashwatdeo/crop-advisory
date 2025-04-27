<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')
            ->where('email', 'Shashwatmilan143@gmail.com')
            ->update([
                'is_admin' => true,
                'role' => 'admin',
                'status' => 'active',
                'email_verified_at' => now(),
            ]);
    }
} 