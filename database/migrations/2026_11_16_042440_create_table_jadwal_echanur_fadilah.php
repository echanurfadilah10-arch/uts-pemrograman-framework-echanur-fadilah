<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('t_jadwal_echanur_fadilah', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kelas_id');
            $table->unsignedBigInteger('pelajaran_id');
            $table->string('hari', 10);
            $table->string('jam_mulai', 5);
            $table->string('jam_selesai', 5);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('t_jadwal_echanur_fadilah');
    }
};