<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('t_siswa_echanur_fadilah', function (Blueprint $table) {
            $table->id();
            $table->string('nis', 10);
            $table->string('nama_siswa', 100);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('t_siswa_echanur_fadilah');
    }
};