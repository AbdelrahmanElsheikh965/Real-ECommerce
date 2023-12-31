<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SubCategory>
 */
class SubCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categoriesIDs = Category::pluck('id');
        return [
            'name'          => fake()->word(),
            'image'          => fake()->word() . fake()->randomElement(['.jpg', '.jpeg', '.png']),
            'category_id'   => fake()->randomElement($categoriesIDs)
        ];
    }
}
