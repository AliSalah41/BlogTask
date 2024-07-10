<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // return [
        //     //
        // ];
        protected $model = Ca::class;

        public function definition()
        {
            return [
                'name' => $this->faker->word,
                'parent_id' => null, // We'll handle parent-child relationships later
            ];
        }
    }
}
