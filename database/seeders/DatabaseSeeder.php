<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\User;
use App\Models\Course;
use App\Models\Comment;
use App\Models\Country;
use App\Models\Wishlist;
use App\Models\University;
use App\Models\CourseMajor;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        User::factory()->count(10)->create();
        CourseMajor::factory()->count(5)->create();
        Country::factory()->count(10)->create();
        $countries = Country::get();
        foreach ($countries as $country) {
            echo "Country {$country->name} \n\r";
            for ($count = 0; $count < $faker->numberBetween(5, 20); $count++) {
                $faker->seed(rand());
                University::factory()->create(
                    [
                        'name' => $faker->company() . " " . $faker->companySuffix(),
                        'city' => $faker->city(),
                        'logo' => "https://picsum.photos/200/300",
                        'country_id' => $country->id,
                        'details' => Str::limit($faker->paragraphs(3, true), 255, ''),
                        'is_enabled' => $faker->optional(0.8)->boolean ? 0 : 1
                    ]
                );
            }
            $universities = University::get();
            foreach ($universities as $university) {
                $faker->seed(rand());
                echo "\t- University {$university->name} \n\r";
                for ($count = 0; $count < $faker->numberBetween(5, 25); $count++) {
                    Course::factory()->create(
                        [
                            'name' => $faker->jobTitle(),
                            'details' => Str::limit($faker->paragraphs(3, true), 255, ''),
                            'university_id' => $university->id,
                            'course_major_id' => CourseMajor::inRandomOrder()->first(),
                            'is_enabled' => $faker->optional(0.8)->boolean ? 0 : 1
                        ]
                    );
                }
            }
        }
        // Country::factory()->count(50)->create();
        // University::factory()->count(200)->create();
        // Course::factory()->count(500)->create();

        Tag::factory()->count(25)->create();
        $tags = Tag::get()->pluck('id');
        foreach (Course::get() as $course) {
            $random = $faker->numberBetween(1, 15);
            $selected = array_unique($faker->randomElements($tags, $random));
            sort($selected);
            $course->tags()->sync($selected);
            echo "\t- Attaching {$course->name} \n\r";
        }

        Wishlist::factory()->count(1000)->create();
        Comment::factory()->count(1000)->create();
    }
}
