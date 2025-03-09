<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('absens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('guru_pengajar_id')->constrained('gurus')->onDelete('cascade'); // Guru yang mengajar di kelas
            $table->foreignId('guru_piket_id')->constrained('users')->onDelete('cascade'); // Guru Piket yang absen
            $table->foreignId('siswa_id')->constrained('users')->onDelete('cascade'); // Siswa yang mengkonfirmasi
            $table->string('kelas');
            $table->date('tanggal');
            $table->time('jam');
            $table->enum('status', ['pending', 'confirmed'])->default('pending');
            $table->enum('keterangan', ['hadir', 'tidak_hadir']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absens');
    }
};
