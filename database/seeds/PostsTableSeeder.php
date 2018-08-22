<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker\Factory::create();
      for ($i = 0; $i < 20; $i++) {
        DB::table('posts')->insert([
          'title' => $faker->words($nb = 6, $asText = true),
          'desc' => $faker->text(),
          'created_at' => Carbon::now()
        ]);
      }
    }
}
