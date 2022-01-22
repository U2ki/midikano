<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\ThumbnailImage;
use Illuminate\Http\Request;

class TopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $images = ThumbnailImage::orderBy('id', 'DESC')->take(9)->get();
        $goodimages = ThumbnailImage::select( 'thumbnail_images.*' )->join( 'posts', 'thumbnail_images.post_id', '=', 'posts.id' )
                                     ->orderBy('posts.goods', 'DESC')->get();

        $news = News::orderBy('id', 'DESC')->take(6)->get();

        return view( 'top', compact( 'images', 'goodimages', 'news') );
    }
}
