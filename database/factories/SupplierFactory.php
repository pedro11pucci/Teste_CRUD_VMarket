<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Supplier>
 */
class SupplierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->word,
            'cnpj' => $this->faker->postcode,
            'location' => $this->faker->streetAddress() .', '. $this->faker->city(),
            'phone' => $this->faker->phoneNumber(),
            'email'=> $this->faker->unique()->email(),
        ];
    }
}
