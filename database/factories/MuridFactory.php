<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Murid>
 */
class MuridFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nis' => $this->faker->unique()->numberBetween(11020201993,11020211993),
            'nama' => $this->faker->name(),            
            'kelas_id' => 1,
            'tahun_id' => 1,            
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
