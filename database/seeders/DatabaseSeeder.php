<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
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
                'description' => $faker->text()
            ]);
        }
    }
}