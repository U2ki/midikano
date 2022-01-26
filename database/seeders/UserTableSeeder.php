<?php

namespace Database\Seeders;

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
            'name' => 'test(管理者)',
            'email' => 'test@test.com',
            'password' => 'testtest',
            'status' => 2,
        ]);
    }
}
