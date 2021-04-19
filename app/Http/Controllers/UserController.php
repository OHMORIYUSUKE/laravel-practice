<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    // JSONのポストを実行
    public function insertUser(Request $request){
        $u_id = $request->input('u_id');
        $name = $request->input('name');
        $refreshToken = $request->input('refreshToken');
        $icon_url = $request->input('icon_url');

        if(!$u_id){
            return response()->json(['message'=>'error']);
        }

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
}
