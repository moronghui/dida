<?php
namespace App\Api\Controllers;

use App\Wechat;
use Illuminate\Http\Request;
use JWTAuth;
use App\Api\Controllers\LoginController;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;


class AuthController extends BaseController
{
    /**
     * The authentication guard that should be used.
     *
     * @var string
     */
    public function __construct()
    {
        parent::__construct();

    }

    /**
     *@author Arius
     *@function set a token for user
     *
     *@return token json
     */
    public function authenticate(Request $request)
    {
        // $code = $request->get('code');
        // $openid = new LoginController();
        // $openid = $openid->info($code,$_SERVER['REMOTE_ADDR']);

        $user = wechat::where("openid","=",'oAqeFws1vR9PHOzGi1vvWwb1kskE')->first();
        if (!$user){
          $arr = array ('status'=>"NO USER");
          return response()->json(compact('arr'));
        }
        $user['now'] = time();
        $user['secret'] = "wearevtmers";
        $user['random'] = rand(1000000,10000000);
        // return $user;
        $token = JWTAuth::fromUser($user);
        return response()->json(compact('token'));
    }



    public function logout(){
      // $token = $request->get('token');
        JWTAuth::refresh();
        $arr = array ('LOG OUT'=>"SUCCESSED");
        return response()->json(compact('arr'));
    }


}
