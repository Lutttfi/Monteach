<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('guru_piket', function (Blueprint $table) {
            $table->id();
    $table->unsignedBigInteger('guru_id');
    $table->string('nama')->nullable(); // <- Tambahkan nullable biar bisa kosong
    $table->timestamps();

    $table->foreign('guru_id')->references('id')->on('gurus')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('guru_piket');
    }
};
