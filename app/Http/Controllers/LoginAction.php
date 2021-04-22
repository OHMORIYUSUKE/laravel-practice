<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Firebase\Auth\Token\Exception\InvalidToken;
use Illuminate\Http\JsonResponse;
use Kreait\Firebase\Factory;
use Log;

class LoginAction extends Controller
{
    /**
     * @var Factory
     */
    private $firebase;

    /**
     * コンストラクタインジェクションで $firebase を用意します
     * @param Factory $firebase
     */
    public function __construct(Factory $firebase)
    {
        $this->firebase = $firebase;
    }

    /**
     * シングルアクションコントローラです。 /api/auth に POST されると、これが実行されます
     * @param  Request  $request
     * @return JsonResponse
     */
    public function __invoke(Request $request): JsonResponse
    {
        $id_token = $request->input('idToken');

        try {
            $verifiedIdToken = $this->firebase->createAuth($id_token);
        } catch (InvalidToken $e) {
            return response()->json([
                'error' => 'error!!',
            ]);
        }

        //$uid = $verifiedIdToken->getClaim('sub');
        //$firebase_user = $this->firebase->getAuth()->getUser($uid);
        Log::debug(print_r($verifiedIdToken, true));
        $uid = $verifiedIdToken->claims()->get('sub');
        return response()->json([
            $uid,
            'おーーーーーー'=>'あ',
        ]);
    }
}