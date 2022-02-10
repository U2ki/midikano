<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ThumbnailTableSeeder extends Seeder
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
                    'post_id' => 10,
                    'src' => '1643342325IMG_2044.jpg',
                ],
                [
                    'post_id' => 1,
                    'src' => '1643342362IMG_2072.jpg',
                ],
                [
                    'post_id' => 2,
                    'src' => '1643342411IMG_2114.jpg',
                ],
                [
                    'post_id' => 3,
                    'src' => '1643342449IMG_2143.jpg',
                ],
                [
                    'post_id' => 4,
                    'src' => '1643342501IMG_2172.jpg',
                ],
                [
                    'post_id' => 5,
                    'src' => '1643342547IMG_2225.jpg',
                ],
                [
                    'post_id' => 6,
                    'src' => '1643342590IMG_2265.jpg',
                ],
                [
                    'post_id' => 7,
                    'src' => '1643342622IMG_2287.jpg',
                ],
                [
                    'post_id' => 8,
                    'src' => '1643342654IMG_2354.jpg',
                ],
                [
                    'post_id' => 9,
                    'src' => '1643342684IMG_2388.jpg',
                ],
            ];

        $now = Carbon::now();
        foreach ($params as $param) {
            $param['created_at'] = $now;
            $param['updated_at'] = $now;
            DB::table('thumbnail_images')->insert($param);
        }
    }
}
