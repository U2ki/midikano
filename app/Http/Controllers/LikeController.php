<?php

namespace App\Http\Controllers;

use App\Models\PostGood;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function firstcheck($post) {
        $user = Auth::user();
        if( $user ) {
            $like = PostGood::where('post_id',$post)->where('user_id',$user->id)->first();
            $likes = new PostGood;
            if($like) {
                $count = $likes->where('post_id',$post)->where('like',1)->count();
                return [$like->like,$count];
            } else {
                $like = $likes->create([
                    'user_id' => $user->id,
                    'post_id' => $post,
                    'like' => 0
                ]);
                $count = $likes->where('post_id',$post)->where('like',1)->count();
                return [$like->like,$count];
            }
        } else {
            $likes = new PostGood;
            $count = $likes->where('post_id',$post)->where('like',1)->count();
            return [0,$count];
        }
    }

    public function check($post) {
        $user = Auth::user();
        if( $user ) {
            $likes = new PostGood();
            $like  = PostGood::where( 'post_id', $post )->where( 'user_id', $user->id )->first();
            if ( $like->like == 1 ) {
                $like->like = 0;
                $like->save();
                $count = $likes->where( 'post_id', $post )->where( 'like', 1 )->count();

                return [ $like->like, $count ];
            } else {
                $like->like = 1;
                $like->save();
                $count = $likes->where( 'post_id', $post )->where( 'like', 1 )->count();

                return [ $like->like, $count ];
            };
        } else {
            $likes = new PostGood;
            $count = $likes->where('post_id',$post)->where('like',1)->count();
            return [0,$count];
        }
    }
}
