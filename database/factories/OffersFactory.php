<?php

namespace Database\Factories;

use App\Models\Partner;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Offers>
 */
class OffersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->unique()->sentence(3),
            'description' => $this->faker->sentence(10),
            'category' => $this->faker->sentence(1),
            'availability' => $this->faker->numberBetween(0,1),
            'partner_id' => Partner::inRandomOrder()->first()->id,
        ];
    }
}
