<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
{
    User::updateOrCreate(
        ['email' => 'admin@kelompok4.com'],
        ['name' => 'Admin', 'password' => 'password123', 'role' => 'admin']
    );

    User::updateOrCreate(
        ['email' => 'cust@kelompok4.com'],
        ['name' => 'Customer', 'password' => 'password123', 'role' => 'customer']
    );
}
}
