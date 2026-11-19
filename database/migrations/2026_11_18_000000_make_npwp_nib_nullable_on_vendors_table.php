<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// VendorController memvalidasi npwp & nib sebagai 'nullable',
// tapi kolomnya NOT NULL di migrasi awal -> error saat dikosongkan.
return new class extends Migration
{
    public function up(): void
    {
        Schema::table('vendors', function (Blueprint $table) {
            $table->string('npwp')->nullable()->change();
            $table->string('nib')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('vendors', function (Blueprint $table) {
            $table->string('npwp')->nullable(false)->change();
            $table->string('nib')->nullable(false)->change();
        });
    }
};
