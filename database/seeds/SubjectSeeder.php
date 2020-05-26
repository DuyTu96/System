<?php

use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
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
            DB::table('subjects')->insert([
                'name' => $faker->unique()->text(20),
                'description' => $faker->unique()->text(2000),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
