<?php

namespace App\Http\Controllers;

use App\Mail\Contacted;
use Illuminate\Http\Request;

class ContactController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view( 'contact' );
    }

    public function send(Request $request) {
        $params = [
            'name' => $request->name,
            'email' => $request->email,
            'select' => $request->select,
            'body' => $request->body,
        ];

        \Mail::to('urulabo.test@gmail.com')->send(new Contacted($params));
        $request->session()->regenerateToken();
    }
}
