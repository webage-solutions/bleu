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
            [
                'id' => 1,
                'name' => 'Jeferson R Almeida',
                'email' => 'jeferson@webage.solutions',
                'password' => bcrypt('password')
            ], [
                'id' => 2,
                'name' => 'John Doe',
                'email' => 'johndoe@webage.solutions',
                'password' => bcrypt('password')
            ],
        ]);
    }
}
