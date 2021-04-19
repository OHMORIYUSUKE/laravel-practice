<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Log;

class PostController extends Controller
{
    // jsonを返すRestAPI
    public function postsAll(){
        // 全部取得
        $items = DB::select('SELECT * FROM post LEFT JOIN user ON post.u_id = user.u_id');
        Log::debug(print_r($items, true));
        return response()->json(
            $items,
            200,
            [],
            JSON_UNESCAPED_UNICODE |
            JSON_UNESCAPED_SLASHES
        );
    }
    // JSONのポストを実行
    public function insertPost(Request $request){
        $u_id = $request->input('u_id');
        $content = $request->input('content');

        DB::insert('INSERT INTO post 
                    (u_id, content) 
                    values (?, ?)', 
                    [$u_id,$content]
                );

        return response()->json([
            'u_id' => $u_id,
            'content' => $content,
         ]);
    }
}
