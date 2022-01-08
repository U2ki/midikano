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
        $news = News::orderBy('id', 'DESC')->take(6)->get();

        return view( 'top', compact( 'images', 'news') );
    }
}
