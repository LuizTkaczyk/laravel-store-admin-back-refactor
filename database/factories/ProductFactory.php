<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Product::class;
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'value' => $this->faker->randomDigit(),
            'quantity' => $this->faker->randomNumber(),
            'buy_value' => $this->faker->randomDigit(),
            'percentage' => $this->faker->randomNumber(),
            'sell_value' => $this->faker->randomDigit(),
            'code' => $this->faker->randomNumber()
        ];
    }
}
