<?php

namespace Database\Factories;

use App\Models\University;
use App\Models\CourseMajor;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->jobTitle(),
            'details' => Str::limit($this->faker->paragraphs(3, true), 255, ''),
            'university_id' => University::inRandomOrder()->first(),
            'course_major_id' => CourseMajor::inRandomOrder()->first(),
            'is_enabled' => $this->faker->randomElement([1, 0]),
        ];
    }
}
