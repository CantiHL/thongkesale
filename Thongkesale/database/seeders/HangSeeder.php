<?php

namespace Database\Seeders;
use App\Models\Hang;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Hang::factory()->count(5)->create();
    }
}
