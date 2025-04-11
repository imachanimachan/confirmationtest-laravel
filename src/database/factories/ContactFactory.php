<?php

namespace Database\Factories;

use App\Models\Category;
use Doctrine\Inflector\Rules\Word;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'first_name' => fake('ja_JP')->firstname(),
            'last_name' => fake('ja_JP')->lastname(),
            'gender' => fake()->numberBetween(1, 3),
            'email' => fake()->safeEmail(),
            'tel' => fake('ja_JP')->phoneNumber(),
            'address' => fake('ja_JP')->address(),
            'building' => fake('ja_JP')->secondaryAddress(),
            'detail' => fake('ja_JP')->realText(100),
            'category_id' => Category::inRandomOrder()->first()?->id
                ?? Category::factory()->create()->id,

        ];
    }
}
