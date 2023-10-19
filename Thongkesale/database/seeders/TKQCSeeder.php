<?php

namespace Database\Seeders;
use App\Models\TKQC;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TKQCSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TKQC::factory()->count(5)->create();
    }
}
