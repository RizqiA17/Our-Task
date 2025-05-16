<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Group>
 */
class GroupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->unique()->words(2, true);

        return [
            'slug' => Str::slug($name) . '-' . Str::random(4),
            'group_name' => $name,
            'group_description' => $this->faker->sentence(),
            'group_image' => 'default-image.png',
            'group_banner' => 'default-banner.jpg',
        ];
    }
}
