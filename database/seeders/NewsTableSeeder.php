<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class NewsTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $params =
            [
                [
                    'title'   => 'テスト用アカウントで作成',
                    'content' => 'この投稿はテスト用アカウントで作成しました。

編集・削除可能です。

削除する場合には、なにか投稿記事作っていただき、そちらを削除していただけると幸いです！',
                    'type'    => 0,
                    'user_id' => 2,
                ],
                [
                    'title'   => '管理者アカウントで作成。',
                    'content' => 'こちらは管理者アカウントで作成しているため、テスト用アカウントの権限では編集・削除ができません。',
                    'type'    => 0,
                    'user_id' => 1,
                ],
                [
                    'title'   => '本アプリケーションを使用していただきありがとうございます',
                    'content' => '本アプリケーションを使用していただきありがとうございます。

簡単で良いので、アンケートのご協力お願いいたします。
https://forms.gle/AkHrStzdDhkdU76L7

アンケート回答していただけるの待ってます！！！！！！！！！！！！！！！！！！',
                    'type'    => 1,
                    'user_id' => 1,
                ],
            ];

        $now = Carbon::now();
        foreach ( $params as $param ) {
            $param['created_at'] = $now;
            $param['updated_at'] = $now;
            DB::table( 'news' )->insert( $param );
        }
    }
}
