<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\BaseControllerAPI as BaseController;
use App\Models\User;
use App\Notifications\SignupActivateSuccess;

class AuthController extends BaseController
{
    public function signupActivate(string $token) 
    {
        $user = User::where('activation_token', $token)->first();

        if (!$user) {
            return $this->sendError('Invalid.', 'This activation token is invalid.');
        }

        $user->email_verified_at = Carbon::now()->format('Y-m-d H:i:s');
        $user->activation_token = '';
        $user->save();

        $user->notify(new SignupActivateSuccess($user));

        return $this->sendResponse($user, 'Account verified successfully.');
    }

    /**
     * Login api
     * @param \Illuminate\Support\Facades\Auth $user
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $findUser = User::whereRaw("email = '$request->email'")->first();
        if ($findUser) {
            $decrypt = Crypt::decryptString($findUser->password);
            if ($decrypt === (string)$request->password) {
                $success['access_token'] = $findUser->createToken(env('API_SECRET_TOKEN'))->plainTextToken;
                $success['name'] = $findUser->name;
                $success['permission'] = $findUser->profile->name;
                $success['id'] = $findUser->id;
                return $this->sendResponse($success, 'User login successfully.');
            }
            return $this->sendError('Unauthorised.', ['error' => 'Unauthorised']);
        } else {
            return $this->sendError('Unauthorised.', ['error' => 'Unauthorised']);
        }
    }
}
