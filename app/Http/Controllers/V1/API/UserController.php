<?php

namespace App\Http\Controllers\V1\API;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function userLogin(Request $request)
    {

        $allInput  = $request->all();

        $isValidate = Validator::make($allInput, [
            'phone'             => 'required|string',
            'password'          => 'required|string|min:6',
            'firebase_token'    => 'required|string|min:10',

        ]);

        if($isValidate->fails()) {

            return response()->json(
                [
                    'error' => $isValidate->errors()
                ],
                422
            );
        }

        if(Auth::attempt(['phone'=>$request->phone, 'password'=>$request->password])) {

            $user = Auth::user();

            $token = $user->createToken('my_access_token')->accessToken;

            return response()->json([

                'status' => 200,

                'error'  => false,

                'data'   => $user,

                'token'  => $token

            ]);

        } else {

            return response()->json([

                'status' => 401,

                'error'  => true,

                'message'  => "Authentication Fail"

            ]);
        }

    }

    public function userInformation()
    {

        $user = Auth::guard('api')->user();

        return response()->json([

            'status' => 200,

            'error'  => false,

            'user'  => $user,

        ]);
    }

    public function changePassword(Request $request)
    {

        $allInput  = $request->all();

        $isValidate = Validator::make($allInput, [

            'password' => 'required|string|min:6|confirmed'

        ]);

        if($isValidate->fails()) {

            return response()->json(
                [
                    'error' => $isValidate->errors()
                ],
                422
            );
        }

        $profileToEdit = Auth::guard('api')->user();

        if (Hash::check(request()->input('current_password'), $profileToEdit->password)) {

            $profileToEdit->password = bcrypt(request()->input('password'));

            if($profileToEdit->save()) {

                return response()->json([

                    'error'     => false,

                    'status'    => 200,

                    'message'   => "Password Change Successfully"

                ], 200);
            } else {

                return response()->json([

                    'error'     => false,

                    'status'    => 401,

                    'message'   => "Password Could Not be Changed"

                ], 401);

            }

        } else {

            return response()->json([

                'error'     => false,

                'status'    => 401,

                'message'   => "In Correct Password"

            ], 401);

        }
    }

    public function userProfileUpdate(Request $request)
    {

    }

    public function userLogout()
    {

        if(Auth::guard('api')->check()) {

            $accessToken = Auth::guard('api')->user()->token();

            DB::table('oauth_refresh_tokens')
                ->where('access_token_id', $accessToken->id)
                ->update(['revoked'=> true]);

            $accessToken->revoke();

            return response()->json(['message'=>'User logout successfully'], 200);

        }

        return response()->json(['data'=>'Unauthenticated Access'], 401);
    }

}
