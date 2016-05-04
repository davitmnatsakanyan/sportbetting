<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Anton',
            'username' => '711891792208276',
            'email' => 'Anton@gmail.com',
            'password' => bcrypt('711891792208276'),
            'role' => 1
        ]);
    }
}
