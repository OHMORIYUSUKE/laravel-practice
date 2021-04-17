<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    // jsonを返すRestAPI
    public function postsAll(){
        // 全部取得
        $items = DB::select('SELECT * FROM post LEFT JOIN user ON post.user_id = user.id');
        return response()->json(
            $items,
            200,
            [],
            JSON_UNESCAPED_UNICODE |
            JSON_UNESCAPED_SLASHES
        );
    }
}
