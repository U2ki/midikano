<?php

namespace App\Http\Controllers;

use App\Mail\StatusMail;
use App\Models\News;
use App\Models\ThumbnailImage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct() {
//        $this->middleware( 'auth' );
//    }

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
                                 ->groupBy('id')
                                 ->get();

        return view( 'auth/mypage', compact( 'img', 'news', 'good', 'comment' ) );
    }

    public function send( Request $request ) {
        $user = Auth::user();

        if ( $request->select === '管理者' ) {
            $status_id = 2;
        } elseif ( $request->select === '関係者' ) {
            $status_id = 1;
        } else {
            $status_id = 0;
        }

        $params = [
            'select'    => $request->select,
            'user'      => $user,
            'status_id' => $status_id
        ];

        \Mail::to( 'urulabo.test@gmail.com' )->send( new StatusMail( $params ) );
        $request->session()->regenerateToken();
    }

    public function status( Request $request ) {
        if ( $this->returnUser() < 2 ) {
            $error_num = 1;

            return view( 'error', compact( 'error_num' ) );
        } else {
            $user         = User::find( $request->user_id );
            $user->status = $request->status_id;
            $user->save();

            return view( 'auth.status' );
        }
    }
}
