<?php

namespace Database\Factories;

use App\Models\Hang;
use App\Models\NhanSu;
use App\Models\TKQC;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Don>
 */
class DonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nhansu_id' => NhanSu::factory()->create()->id,
            'tkqc_id' => TKQC::factory()->create()->id,
            'hang_id' => Hang::factory()->create()->id,
            'tongchitieu' => $this->faker->randomDigitNotNull,
            'mes' => $this->faker->numberBetween(1, 10),
            'cmt' => $this->faker->numberBetween(1, 10),
            'tt' => $this->faker->numberBetween(1, 10),
            'don' => $this->faker->numberBetween(1, 10),
        ];
    }
}
