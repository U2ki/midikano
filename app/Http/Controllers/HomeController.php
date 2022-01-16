<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\ThumbnailImage;
use Illuminate\Http\Request;

class HomeController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware( 'auth' );
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        $user_id = auth()->id();
        $img     = ThumbnailImage::select( 'thumbnail_images.*' )->join( 'posts', 'thumbnail_images.post_id', '=', 'posts.id' )
                                 ->where( 'posts.user_id', '=', $user_id )->orderBy( 'id', 'DESC' )->get();
        $news    = News::orderBy( 'id', 'DESC' )->where( 'user_id', $user_id )->get();
        $good    = ThumbnailImage::select( 'thumbnail_images.*' )
                                 ->join( 'post_goods', 'thumbnail_images.post_id', '=', 'post_goods.post_id' )
                                 ->where( 'post_goods.user_id', '=', $user_id )
                                 ->where( 'post_goods.like', '=', 1 )
                                 ->orderBy( 'id', 'DESC' )
                                 ->get();
        $comment = ThumbnailImage::select( 'thumbnail_images.*' )
                                 ->join( 'post_comments', 'thumbnail_images.post_id', '=', 'post_comments.post_id' )
                                 ->where( 'post_comments.user_id', '=', $user_id )
                                 ->orderBy( 'id', 'DESC' )
                                 ->get();

        return view( 'auth/mypage', compact( 'img', 'news', 'good', 'comment' ) );
    }


}
