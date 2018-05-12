<?php

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\User;

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

        	'name' => 'Paulo',
        	'perfil' => 'professor',
        	'email' => 'paulodetarso@gmail.com',
        	'password' => bcrypt('b13pl23'),


        ]);
    }
}
