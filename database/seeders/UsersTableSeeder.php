<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'role_id' => '1',
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
        ]);

        DB::table('users')->insert([
            'role_id' => '2',
            'name' => 'Receptionist',
            'username' => 'receptionist',
            'email' => 'receptionist@gmail.com',
            'password' => bcrypt('receptionist'),
        ]);
        DB::table('users')->insert([
            'role_id' => '3',
            'name' => 'User',
            'username' => 'user',
            'email' => 'user@gmail.com',
            'password' => bcrypt('user'),
        ]);
    }
}
