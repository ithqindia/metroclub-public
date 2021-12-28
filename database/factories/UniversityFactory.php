<?php

namespace Database\Factories;

use App\Models\Country;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class UniversityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company() . " " . $this->faker->companySuffix(),
            'city' => $this->faker->city(),
            'logo' => "https://picsum.photos/200/300",
            'country_id' => Country::inRandomOrder()->first(),
            'details' => Str::limit($this->faker->paragraphs(3, true), 255, ''),
            'is_enabled' => $this->faker->randomElement([1, 0]),
        ];
    }
}
