<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        
    	foreach (range(1,50) as $index) {
            DB::table('blogs')->insert([
                'name' => $faker->name,
                'image'=>'default.png',
                'description' => $faker->text(),
            ]);
        }
    }
}
