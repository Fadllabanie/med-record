<?php

namespace App\Http\Controllers\API\V1\Auth;

use App\Models\User;
use App\Http\Requests\Api\Auth\LoginRequest;
use App\Http\Resources\UserResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function store(LoginRequest $request)
    {
        $user = User::where([
            ['email', '=', $request->email],
            ['provider_name', '=', $request->provider_name],
            ['provider_id', '=', $request->provider_id]
        ])->first();

        if ($user) {
            if (! $user->active) {
                throw ValidationException::withMessages([
                    'email' => [trans('You account has been blocked.')],
                ]);
            }

            //check for subscription
        } 

        $user = User::create($request->validated());

        return (new UserResource($user))
            ->additional(['meta' => [
                'token_type' => 'Bearer',
                'access_token' => $user->createToken('authToken')->plainTextToken,
            ]]);
    }
}
