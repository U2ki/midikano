<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller {

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
        $newsalls = News::orderBy( 'id', 'DESC' )->get();
        $user     = $this->returnUser();

        return view( 'news.news', compact( 'newsalls', 'user' ) );
    }

    /**
     * ニュース作成ページ
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        if ( ! Auth::user() ) {
            $error_num = 1;

            return view( 'error', compact( 'error_num' ) );
        }

        return view( 'news.create' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request ) {
        if ( $request->select == 'ニュース' ) {
            $select = 0;
        } else {
            $select = 1;
        }
        $news          = new News;
        $news->title   = $request->title;
        $news->type    = $select;
        $news->content = $request->body;
        $news->user_id = auth()->id();
        $news->save();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show( $id ) {
        $news = News::find( $id );

        if (!$news) {
            $error_num = 2;
            return view( 'error', compact( 'error_num' ) );
        } else {
            $user = $this->returnUser();

            return view( 'news.show', compact( 'news', 'user' ) );
        }
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
        $news = News::find( $id );
        if ( $request->select == 'ニュース' ) {
            $news->type = 0;
        } elseif ( $request->select == 'イベント' ) {
            $news->type = 1;
        }
        $news->title   = $request->title;
        $news->content = $request->body;
        $news->user_id = auth()->id();

        $news->save();

        $user = $this->returnUser();

        return view( 'news.show', compact( 'news', 'user' ) );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id ) {
        $news = News::find( $id );
        $news->delete();

        $newsalls = News::get();
        $user = $this->returnUser();

        return view( 'news.news', compact( 'newsalls', 'user' ) );
    }
}
