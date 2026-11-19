<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Kolom 'role' sudah dibuat di create_users_table, jadi migrasi ini
// hanya menambahkan kolom jika belum ada (mencegah error "duplicate column").
return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasColumn('users', 'role')) {
            return;
        }

        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->default('customer');
        });
    }

    public function down(): void
    {
        // dibiarkan kosong: kolom 'role' dimiliki oleh create_users_table
    }
};
