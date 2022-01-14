<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostCommentsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create( 'post_comments', function ( Blueprint $table ) {
            $table->id();
            $table->integer( 'user_id' )->comment( 'ユーザ' )->nullable();
            $table->foreignId( 'post_id' )->comment( '投稿' )->constrained( 'posts' )->onUpdate( 'cascade' )->onDelete( 'cascade' );
            $table->string( 'content' )->comment( '内容' );
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
        Schema::dropIfExists( 'post_comments' );
    }
}
