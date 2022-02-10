<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $params =
            [
                [
                    'content' => '大津山先生から提供していただいたもの。
撮影中の光の加減で途中すこしおかしく見えるかも。
※これは管理者権限アカウントで作成しているため、テスト用アカウントでは編集・削除ができません。',
                    'user_id' => 2,
                ],
                [
                    'content' => '大津山先生に提供していただいたもの。

ターンテーブルが鏡のようになっているので、少しおかしく見えるかもしれないです。

※これは管理者権限アカウントで作成しているため、テスト用アカウントでは編集・削除ができません。',
                    'user_id' => 2,
                ],
                [
                    'content' => '大津山先生に提供していただいたもの。

どんぶりぐらいの大きさ。

※これは管理者権限アカウントで作成しているため、テスト用アカウントでは編集・削除ができません。',
                    'user_id' => 2,
                ],
                [
                    'content' => '大津山先生に提供していただいたもの。

※これは管理者権限アカウントで作成しているため、テスト用アカウントでは編集・削除ができません。',
                    'user_id' => 2,
                ],
                [
                    'content' => '大津山先生に提供していただいたもの。

模様がないため、回ってるように見えるか不安。

※これは管理者権限アカウントで作成しているため、テスト用アカウントでは編集・削除ができません。',
                    'user_id' => 2,
                ],
                [
                    'content' => '大津山先生に提供していただいたもの。

柄がないもの。

※これは管理者権限アカウントで作成しているため、テスト用アカウントでは編集・削除ができません。',
                    'user_id' => 2,
                ],
                [
                    'content' => '大津山先生に提供していただいたもの。
※これは管理者権限アカウントで作成しているため、テスト用アカウントでは編集・削除ができません。',
                    'user_id' => 2,
                ],
                [
                    'content' => 'まえのうるらぼで作成されたデザインを実際に作った物らしいです。
めっちゃ綺麗。

※これは管理者権限アカウントで作成しているため、テスト用アカウントでは編集・削除ができません。',
                    'user_id' => 2,
                ],
                [
                    'content' => 'まえのうるらぼで作成されたデザインをもとに実際に作られた物。

一個前に投稿されたものと同じ。
こっちのは、ターンテーブルの鏡によって、下側のデザインがわかりやすいかもしれないです。

テスト用アカウントで作成しているため、コメントの編集や投稿の削除が可能。
※削除はしないで下さい。。。',
                    'user_id' => 2,
                ],
                [
                    'content' => 'どこかでもらった記念品。
※これは管理者権限アカウントで作成しているため、テスト用アカウントでは編集・削除ができません。',
                    'user_id' => 1,
                ],
            ];

        $now = Carbon::now();
        foreach ( $params as $param ) {
            $param['created_at'] = $now;
            $param['updated_at'] = $now;
            DB::table( 'posts' )->insert( $param );
        }
    }
}
