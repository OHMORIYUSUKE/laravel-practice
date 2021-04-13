<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function index($id='noname',$pass='unknown') {
        return '<h1>HelloControllerのindexアクションです。'.$id.' | '.$pass.'</h1>';
    }
}
