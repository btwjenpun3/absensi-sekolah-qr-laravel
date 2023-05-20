<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Absensi>
 */
class AbsensiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'murid_id' => $this->faker->numberBetween(1,10),
            'kelas_id' => 1,
            'hari' => $this->faker->dayOfWeek(),
            'tanggal' => $this->faker->date('d'),
            'bulan' => $this->faker->date('m'),
            'jam_absen' => $this->faker->time(),
            'status' => $this->faker->numberBetween(0,3),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
