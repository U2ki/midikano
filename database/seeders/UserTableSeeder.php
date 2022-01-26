<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'password' => bcrypt('password'),
            'status' => 2,
        ]);
    }
}
