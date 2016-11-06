<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

      for($i=0;$i<10;$i++) {
        DB::table('meetings')->insert([
            'title' => 'title ' . str_random(10),
            'description' => str_random(10),
            'time' => Carbon::now()
        ]);
      }
    }
}
