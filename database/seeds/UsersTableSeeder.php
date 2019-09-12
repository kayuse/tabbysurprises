<?php

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
            'name' => 'Admin User ' . uniqid(),
            'email' => uniqid('admin') . '@tabbysurprises.com',
            'api_token' => md5(uniqid(bcrypt('password@123'))),
            'password' => bcrypt('password@123'),
        ]);
    }
}
