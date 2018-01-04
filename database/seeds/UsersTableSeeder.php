<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Channing Froom',
            'email' => 'channing@froomiethought.co.za',
            'password' => bcrypt('qwerty'),
        ]);
    }
}
