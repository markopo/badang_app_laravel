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
        DB::table('meetings')->delete();
        DB::table('users')->delete();
        DB::table('meetings_to_users')->delete();

        for ($i = 1; $i < 5; $i++) {
            DB::table('meetings')->insert([
                'title' => 'title ' . str_random(10),
                'description' => str_random(100),
                'time' => Carbon::now()
            ]);

            DB::table('meeting_users')->insert([
                'name' => str_random(10)
            ]);

            DB::table('meetings_to_users')->insert([
                'user_id' => $i,
                'meeting_id' => 2
            ]);
        }


    }
}
