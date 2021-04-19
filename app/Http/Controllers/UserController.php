<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Log;

//DBファサード

class UserController extends Controller
{
    // JSONのポストを実行
    public function insertUser(Request $request){
        $u_id = $request->input('u_id');
        $name = $request->input('name');
        $refreshToken = $request->input('refreshToken');
        $icon_url = $request->input('icon_url');

        DB::insert('INSERT INTO user 
                    (u_id, name, refreshToken, icon_url) 
                    values (?, ?, ? ,?)', 
                    [$u_id, $name, $refreshToken, $icon_url]
                );

        return response()->json([
            'u_id' => $u_id,
            'name' => $name,
            'refreshToken' => $refreshToken,
            'icon_url' => $icon_url,
         ]);
    }
    // ユーザー削除
    public function deleteUser(Request $request){
        $u_id = $request->input('u_id');
        Log::debug(print_r($u_id, true));

        DB::table('user')->where('u_id',$u_id)->delete();

        return response()->json([
            'u_id' => $u_id,
         ]);
    }
}
