<?php

namespace Database\Seeders;

use App\Models\Don;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Don::factory()->count(20)->create();
    }
}
