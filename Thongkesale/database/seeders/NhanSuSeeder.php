<?php

namespace Database\Seeders;
use App\Models\NhanSu;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NhanSuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        NhanSu::factory()->count(5)->create();
    }
}
