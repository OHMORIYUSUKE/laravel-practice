<?php

namespace App\Http\Controllers;

use Kreait\Firebase\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Log;

class PostController extends Controller
{
    private $auth;

    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    // 投稿をすべて返す
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
    
    // 投稿を追加する
    public function insertPost(Request $request){
        $idToken = $request->bearerToken();
        $content = $request->input('content');

        try {
            $verifiedIdToken = $this->auth->verifyIdToken($idToken);   
        }catch (\Exception $e) {
            return response()->json(['message' => 'Token error'],500);
        }
        $uid = $verifiedIdToken->claims()->get('sub');

        DB::insert('INSERT INTO post 
                    (u_id, content) 
                    values (?, ?)', 
                    [$uid,$content]
                );

        return response()->json([
            'u_id' => $uid,
            'content' => $content,
         ]);
    }
}
