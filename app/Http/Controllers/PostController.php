<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view( 'gallery.gallery' );
    }

    /**
     * ニュース作成ページ
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        if ( ! Auth::user() ) {
            $error_num = 0;

            return view( 'error', compact( 'error_num' ) );
        }

        return view( 'gallery.create' );
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request ) {

//      ログインしていないとできないように！！！

        $post          = new Post;
        $post->content = $request->body;
        $post->user_id = auth()->id();
        $post->save();

        $files = request()->file( 'files' );
        $nextId = DB::table('posts')->max('id') + 1;

        foreach ( $files as $index => $image ) {
            $path      = Storage::disk( "public" )->putFile( 'file', $image );
            $imagePath = "/storage/$path";
            $img       = new Image;
            $img->src = $imagePath;
            $img->post_id = $post->id;
            $img->save();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show( $id ) {
        return view( 'gallery.show' );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, $id ) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id ) {
        //
    }
}
