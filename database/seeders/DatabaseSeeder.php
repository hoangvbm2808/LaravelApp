<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'admin1',
            'firstname' => 'Admin',
            'lastname' => 'Admin',
            'email' => 'admin1@argon.com',
            'password' => bcrypt('12345678')
        ]);
        DB::table('users')->insert([
            'username' => 'admin2',
            'firstname' => 'Admin',
            'lastname' => 'Admin',
            'email' => 'admin2@argon.com',
            'password' => bcrypt('12345678')
        ]);
        DB::table('users')->insert([
            'username' => 'admin3',
            'firstname' => 'Admin',
            'lastname' => 'Admin',
            'email' => 'admin3@argon.com',
            'password' => bcrypt('12345678')
        ]);
        DB::table('users')->insert([
            'username' => 'admin4',
            'firstname' => 'Admin',
            'lastname' => 'Admin',
            'email' => 'admin4@argon.com',
            'password' => bcrypt('12345678')
        ]);
        DB::table('users')->insert([
            'username' => 'admin5',
            'firstname' => 'Admin',
            'lastname' => 'Admin',
            'email' => 'admin5@argon.com',
            'password' => bcrypt('12345678')
        ]);
        DB::table('users')->insert([
            'username' => 'admin6',
            'firstname' => 'Admin',
            'lastname' => 'Admin',
            'email' => 'admin6@argon.com',
            'password' => bcrypt('12345678')
        ]);
        DB::table('users')->insert([
            'username' => 'admin7',
            'firstname' => 'Admin',
            'lastname' => 'Admin',
            'email' => 'admin7@argon.com',
            'password' => bcrypt('12345678')
        ]);
    }
}
