<?php

use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i=0; $i <= 50; $i++) { 
            $category_id = $faker->numberBetween(1, 20);
            DB::table('courses')->insert([
                'category_id' => $category_id,
                'name' => $faker->unique()->text(20),
                'description' => $faker->unique()->text(2000),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
