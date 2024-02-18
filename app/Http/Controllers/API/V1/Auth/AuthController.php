<?php

namespace App\Http\Controllers\API\V1\Auth;

use App\Models\User;
use App\Traits\ResponseTrait;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Auth\LoginRequest;
use App\Http\Requests\API\V1\Auth\RegisterUserRequest;

class AuthController extends Controller
{
    use ResponseTrait;

    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function registerUser(RegisterUserRequest $request)
    {
        try {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->is_email_verified = 1;
            $user->save();
            $data['token'] = $user->createToken('ikonic')->plainTextToken;
            $data['user'] = $user;
            return $this->success(true, 'User created', $data);
        } catch (\Exception $e) {
            return $this->fail($e);
        }
    }

    /**
     * Login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(LoginRequest $request)
    {

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = User::where('email', $request->email)->first();
            $data['token'] = $user->createToken('ikonic')->plainTextToken;
            $data['user'] = $user;
            return $this->success(true, 'User logged in', $data);
        } else {
            $data['success'] = false;
            $data['data'] = null;
            $data['errors'] =  [
                [
                    'type' => 'auth',
                    'message' => 'These credentials does not match our record. Please make sure that you enter correct credentials.'
                ]
            ];

            return response()->json($data);
        }
    }
}
