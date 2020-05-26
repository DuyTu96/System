<?php

use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i=0; $i <= 200; $i++) { 
            $subject_id = $faker->numberBetween(1, 50);
            DB::table('tasks')->insert([
                'subject_id' => $subject_id,
                'name' => $faker->unique()->text(20),
                'description' => $faker->unique()->text(2000),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
