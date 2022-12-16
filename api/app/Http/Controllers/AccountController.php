<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseControllerAPI as BaseController;
use App\Models\User;
use App\Notifications\SignupActivateRequest;
use App\Http\Requests\UserRequest;
use Exception;
use Illuminate\Support\Facades\Crypt;

class AccountController extends BaseController
{
    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */

    public function signup(UserRequest $request)
    {
        try {
            
            $request['activation_token'] = $this->createRandomToken(12);
            $request['password'] = Crypt::encryptString($request->password);

            $user = User::create($request->all());
    
            $user['token'] = $user->createToken(env('API_SECRET_TOKEN'))->accessToken;
            $user->notify(new SignupActivateRequest($user));
       
            return $this->sendResponse($user, 'User register successfully.');
        } catch (Exception $err) {
            return $this->sendError(
                'There was an error processing the request',
                $err->getMessage(),
                400
            );
        }
    }

    public function renewPassword($idUser)
    {
        $find = User::where('id', $idUser)->first();
        $find->password = Crypt::encryptString('112233');
        $find->save();
        return $this->sendResponse($find, 'Password renew, current password is ' . $find->password);
    }
}
