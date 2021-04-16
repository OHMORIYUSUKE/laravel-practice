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
    // jsonを返すRestAPI
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
    // JSONのポストを実行
    public function apiPost(Request $request)
    {        
        $groups = $request->input('groups');
        $name = $request->input('name');
        $grade = $request->input('grade');
        $birthday = $request->input('birthday');
        $bloodType = $request->input('bloodType');
        $height = $request->input('height');
        $B = $request->input('B');
        $W = $request->input('W');
        $H = $request->input('H');
        $CV = $request->input('CV');
        $description = $request->input('description');
        $image = $request->input('image');

        DB::insert('INSERT INTO lovelivedatabase 
                    (groups ,name ,grade ,birthday ,bloodType ,height ,B ,W ,H ,CV ,description , image) 
                    values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', 
                    [$groups, $name , $grade, $birthday ,$bloodType ,$height ,$B ,$W ,$H ,$CV ,$description ,$image]
                );

        return response()->json([
            'groups' => $groups,
            'name' => $name,
            'grade' => $grade,
            'birthday' => $birthday,
            'bloodType' => $bloodType,
            'height' => $height,
            'B' => $B,
            'W' => $W,
            'H' => $H,
            'CV' => $CV,
            'description' => $description,
            'image' => $image,
         ]);
    }
}
