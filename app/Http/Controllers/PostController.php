<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Post;
use App\Models\ThumbnailImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller {

    public function returnUser() {
        $user_id = auth()->id();
        if ( $user_id ) {
            $user = \DB::table( 'users' )->where( 'id', $user_id )->first();
            $user = $user->status;
        } else {
            $user = 0;
        }

        return $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $images = ThumbnailImage::orderBy('id', 'DESC')->get();
        $user     = $this->returnUser();

        return view( 'gallery.gallery', compact( 'images', 'user' ) );
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

        $i = 0;
        foreach ( $files as $index => $image ) {
            $imageName = time() . 'IMG_' . $i . '.' . $image->getClientOriginalExtension();
            $imagePath = public_path('uploads/');
            $image->move($imagePath, $imageName);
            $img       = new Image;
            $img->src = $imageName;
            $img->post_id = $post->id;
            $img->save();
            $i++;
        }

        $thumbnail = request()->file( 'thumbnail' );
        $thumbnailName = time() . $thumbnail->getClientOriginalName();
        $thumbnailPath = public_path('thumbnail/');
        $thumbnail->move($thumbnailPath, $thumbnailName);
        $thumbnail       = new ThumbnailImage;
        $thumbnail->src = $thumbnailName;
        $thumbnail->post_id = $post->id;
        $thumbnail->save();

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show( $id ) {
        $post = Post::find( $id );
        $img = Image::where('post_id', $id)->get();
        $user = $this->returnUser();

        return view( 'gallery.show', compact( 'post', 'img' , 'user' ) );
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
        $post = Post::find( $id );
        $post->content = $request->body;
        $post->user_id = auth()->id();

        $post->save();

        $img = Image::where('post_id', $id)->get();
        $user = $this->returnUser();

        return view( 'gallery.show', compact( 'post', 'img' , 'user' ) );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id ) {
        $post = Post::find( $id );
        $post->delete();

        Image::where('post_id', $id)->delete();

        $images = Image::get();
        $user     = $this->returnUser();

        return view( 'gallery.gallery', compact( 'images', 'user' ) );
    }
}
