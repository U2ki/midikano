<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostGoodsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create( 'post_goods', function ( Blueprint $table ) {
            $table->id();
            $table->foreignId( 'user_id' )->comment( 'ユーザ' )->constrained( 'users' )->onUpdate( 'cascade' )->onDelete( 'cascade' );
            $table->foreignId( 'post_id' )->comment( '投稿' )->constrained( 'posts' )->onUpdate( 'cascade' )->onDelete( 'cascade' );
            $table->timestamps();
            $table->softDeletes();
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists( 'post_goods' );
    }
}
