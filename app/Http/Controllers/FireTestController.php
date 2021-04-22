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
        $verifiedIdToken = $this->auth->verifyIdToken($idTokenString);
        $uid = $verifiedIdToken->claims()->get('sub');

        $firebase_user = $this->auth->getUser($uid);

        $this->auth->deleteUser($uid);//<=ユーザー削除

        return response()->json([
            'u_id' => $uid,
            'name' => $firebase_user->displayName, 
         ]);
    }
}