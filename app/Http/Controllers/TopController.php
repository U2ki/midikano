<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\News;
use Illuminate\Http\Request;

class TopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $images = Image::orderBy('id', 'DESC')->take(10)->get();
        $news = News::orderBy('id', 'DESC')->take(6)->get();

        return view( 'top', compact( 'images', 'news') );
    }
}
