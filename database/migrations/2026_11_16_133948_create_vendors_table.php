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
       Schema::create('vendors', function (Blueprint $table) {
        $table->id();
        $table->string('nama_perusahaan');
        $table->string('kategori');
        $table->string('email');
        $table->string('telepon');
        $table->text('alamat');
        $table->string('kota');
        $table->string('npwp');
        $table->string('nib');
        $table->string('nama_pic');
        $table->string('telepon_pic');
        $table->boolean('status')->default(true);
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendors');
    }
};
