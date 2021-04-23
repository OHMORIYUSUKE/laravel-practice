<?php

namespace App\Http\Controllers;
use Kreait\Firebase\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Log;

class FireTestController extends Controller
{
    private $auth;

    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    public function index(Request $request)
    {
        
        $idTokenString = $request->input('idToken');
        // try {
        //     $verifiedIdToken = $this->auth->verifyIdToken($idTokenString);   
        // }catch (\Exception $e) {
        //     $verifiedIdToken = $auth->signInWithRefreshToken($refresh_token);
        // }
        $verifiedIdToken = $this->auth->signInWithRefreshToken($idTokenString);
        // $verifiedIdToken->idToken();
        //$uid = $verifiedIdToken->claims()->get('sub');

        //$firebase_user = $this->auth->getUser($uid);

        //$this->auth->deleteUser($uid);//<=ユーザー削除

        Log::debug(print_r($verifiedIdToken->idToken(), true));

        return response()->json([
            // 'u_id' => $uid,
            // 'name' => $firebase_user->displayName, 
            $verifiedIdToken,
         ]);
    }
}