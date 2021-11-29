<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create( 'news', function ( Blueprint $table ) {
            $table->id();
            $table->string( 'title' )->comment( 'タイトル' );
            $table->string( 'content' )->comment( '内容' );
            $table->integer( 'type' )->comment( '種類' );
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
        Schema::dropIfExists( 'news' );
    }
}
