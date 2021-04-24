<?php

namespace App\Http\Controllers;

use Kreait\Firebase\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Log;

//DBファサード

class UserController extends Controller
{
    private $auth;

    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    // ユーザー追加
    public function insertUser(Request $request){
        $idToken = $request->input('idToken');
        try {
            $verifiedIdToken = $this->auth->verifyIdToken($idToken);   
        }catch (\Exception $e) {
            return response()->json(['message' => 'Token error'],500);
        }
        $uid = $verifiedIdToken->claims()->get('sub');

        $firebase_user = $this->auth->getUser($uid);

        try {
            DB::insert('INSERT INTO user 
                        (u_id, name, icon_url) 
                        values (?, ? ,?)', 
                        [$uid, $firebase_user->displayName, $firebase_user->photoUrl]
                    );
        }catch (\Exception $e) {
            return abort(response()->json(['message' => 'user already exists'],500));
        }

        return response()->json([
            'u_id' => $uid,
            'name' => $firebase_user->displayName, 
            'icon_url' => $firebase_user->photoUrl,
        ]);
    }
    
    // ユーザー削除
    public function deleteUser(Request $request){
        $idToken = $request->input('idToken');

        try {
            $verifiedIdToken = $this->auth->verifyIdToken($idToken);   
        }catch (\Exception $e) {
            return response()->json(['message' => 'Token error'],500);
        }
        $uid = $verifiedIdToken->claims()->get('sub');

        $this->auth->disableUser($uid);

        return response()->json([
            'message' => 'user deleted',
            'u_id' => $uid,
        ]);
    }
}
