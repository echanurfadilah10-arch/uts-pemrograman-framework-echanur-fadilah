<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataSeederEchanurFadilah extends Seeder
{
    public function run(): void
    {
        $now = now();

        DB::table('t_pelajaran_echanur_fadilah')->insert([
            ['kode_pelajaran' => 'PL-1', 'nama_pelajaran' => 'Matematika', 'created_at' => $now, 'updated_at' => $now],
            ['kode_pelajaran' => 'PL-2', 'nama_pelajaran' => 'Bahasa Inggris', 'created_at' => $now, 'updated_at' => $now],
            ['kode_pelajaran' => 'PL-3', 'nama_pelajaran' => 'Bahasa Indonesia', 'created_at' => $now, 'updated_at' => $now],
            ['kode_pelajaran' => 'PL-4', 'nama_pelajaran' => 'Pancasila',