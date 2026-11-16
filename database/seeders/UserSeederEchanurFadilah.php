<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeederEchanurFadilah extends Seeder
{
    public function run(): void
    {
        DB::table('users')->updateOrInsert(
            ['email' => 'echanur@uts.test'],
            [
                'name' => 'Echanur Fadilah',
                'password' => Hash::make('password123'),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}