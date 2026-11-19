<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('armada', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_seri', 30)->unique();
            $table->string('jenis', 20);
            $table->string('merek_model', 60);
            $table->integer('kapasitas');
            $table->string('lokasi', 60);
            $table->string('status', 20);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('armada');
    }
};
