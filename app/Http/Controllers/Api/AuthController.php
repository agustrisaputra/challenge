<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AuthResource;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $data = [
            'email'    => $request->email,
            'password' => $request->password
        ];

        if (auth()->attempt($data)) {
            $token = auth()->user()->createToken('HRD auth')->accessToken;
            return new AuthResource($token);
        } else {
            throw ValidationException::withMessages([
                'email' => __('auth.failed')
            ]);
        }
    }

    public function logout()
    {
        auth()->user()->token()->revoke();

        return empty_object();
    }
}
