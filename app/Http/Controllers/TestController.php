<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function index(){
        $items = DB::select('select * from lovelivedatabase');
        return view('hello.test',['items' => $items]);
    }
    public function api(){
        // 全部取得
        $items = DB::select('SELECT * FROM lovelivedatabase');
        return response()->json(
            $items,
            200,
            [],
            JSON_UNESCAPED_UNICODE |
            JSON_UNESCAPED_SLASHES
        );
    }
    public function apiId (Request $request){
        $id = $request->id;
        //DBファサード
        $items = DB::select('SELECT * FROM lovelivedatabase WHERE id=?', [$id]);
        return response()->json(
            $items,
            200,
            [],
            JSON_UNESCAPED_UNICODE |
            JSON_UNESCAPED_SLASHES
        );
    }
}
