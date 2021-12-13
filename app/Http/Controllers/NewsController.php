<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;

class NewsController extends Controller {

    public function returnUser() {
        $user_id  = auth()->id();
        if ( $user_id ) {
            $user        = \DB::table( 'users' )->where( 'id', $user_id )->first();
            $user_status = $user->status;
        } else {
            $user_status = 0;
        }
        return $user_status;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $newsalls = News::get();
        $user_status = $this->returnUser();

        return view( 'news.news', compact( 'newsalls', 'user_status' ) );
    }

    /**
     * ニュース作成ページ
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
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
        $user_status = $this->returnUser();

        return view( 'news.show', compact( 'news', 'user_status' ) );
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
        $news = News::find($id);
        if ( $request->select == 'ニュース' ) {
            $news->type = 0;
        } elseif ( $request->select == 'イベント' )  {
            $news->type = 1;
        }
        $news->title   = $request->title;
        $news->content = $request->body;
        $news->user_id = auth()->id();

        $news->save();

        $user_status = $this->returnUser();
        return view( 'news.show', compact( 'news', 'user_status' ) );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id ) {
        $news = News::find($id);
        $news->delete();

        $newsalls = News::get();
        $user_status = $this->returnUser();

        return view( 'news.news', compact( 'newsalls', 'user_status' ) );
    }
}
