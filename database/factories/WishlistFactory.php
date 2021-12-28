<?php

namespace Database\Factories;

use App\Models\Tag;
use App\Models\User;
use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

class WishlistFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $tags = Tag::get()->pluck('id');
        $random = $this->faker->numberBetween(1, count($tags));
        $selected = array_unique($this->faker->randomElements($tags, $random));
        sort($selected);

        return [
            'user_id' => User::inRandomOrder()->first(),
            'university_id' => Course::inRandomOrder()->first(),
            'sort_order' => $random,
            'course_tags' => implode("|", $selected)
        ];
    }
}
