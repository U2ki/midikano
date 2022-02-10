<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
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
        $params =
            [
                [
                    'name' => 'test(管理者)',
                    'email' => 'admin@admin.com',
                    'password' => bcrypt('manamana'),
                    'status' => 2,
                ],
                [
                    'name' => 'test(関係者)',
                    'email' => 'hoge@hoge.com',
                    'password' => bcrypt('manamana'),
                    'status' => 1,
                ],
                [
                    'name' => 'test(一般)',
                    'email' => 'test@test.com',
                    'password' => bcrypt('manamana'),
                    'status' => 0,
                ]
            ];

        $now = Carbon::now();
        foreach ($params as $param) {
            $param['created_at'] = $now;
            $param['updated_at'] = $now;
            DB::table('users')->insert($param);
        }
    }
}
