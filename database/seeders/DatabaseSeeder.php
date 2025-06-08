<?php

namespace Database\Seeders;

use App\Models\debt;
use App\Models\expense;
use App\Models\savings;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        savings::factory(10)->create();

        debt::factory(10)->create();

        expense::factory(10)->create();
    }
}
