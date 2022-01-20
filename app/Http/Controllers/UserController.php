<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\ThumbnailImage;
use http\Client\Curl\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index( $id ) {
        $user_info = \DB::table( 'users' )->where( 'id', $id )->first();
        $name = $user_info->name;
        $status = $user_info->status;

        $img     = ThumbnailImage::select( 'thumbnail_images.*' )->join( 'posts', 'thumbnail_images.post_id', '=', 'posts.id' )
                                 ->where( 'posts.user_id', '=', $id )->orderBy( 'id', 'DESC' )->get();
        $news    = News::orderBy( 'id', 'DESC' )->where( 'user_id', $id )->get();
        $good    = ThumbnailImage::select( 'thumbnail_images.*' )
                                 ->join( 'post_goods', 'thumbnail_images.post_id', '=', 'post_goods.post_id' )
                                 ->where( 'post_goods.user_id', '=', $id )
                                 ->where( 'post_goods.like', '=', 1 )
                                 ->orderBy( 'id', 'DESC' )
                                 ->get();
        $comment = ThumbnailImage::select( 'thumbnail_images.*' )
                                 ->join( 'post_comments', 'thumbnail_images.post_id', '=', 'post_comments.post_id' )
                                 ->where( 'post_comments.user_id', '=', $id )
                                 ->orderBy( 'id', 'DESC' )
                                 ->get();

        return view( 'user', compact( 'name', 'status', 'img', 'news', 'good', 'comment' ) );
    }
}
