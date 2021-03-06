<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create( 'posts', function ( Blueprint $table ) {
            $table->id();
            $table->string( 'content' )->comment( '内容' )->nullable();
            $table->integer( 'goods' )->comment( 'いいね数' )->default(0);
            $table->foreignId( 'user_id' )->comment( 'ユーザ' )->constrained( 'users' )->onUpdate( 'cascade' )->onDelete( 'cascade' );
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
        Schema::dropIfExists( 'posts' );
    }
}
