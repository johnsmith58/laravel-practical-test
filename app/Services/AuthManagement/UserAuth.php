<?php

namespace App\Services\AuthManagement;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Services\AuthManagement\AuthInterface;

/**
 * Class UserAuth
 */
class UserAuth implements AuthInterface
{
    public function register(array $request)
    {
        try {
            // user registration
            $user = User::create(array_merge($request, ['password' => Hash::make($request['password'])]));
            $token = $user->createToken('User-Token')->plainTextToken;
            return [
                'user' => $user,
                'token' => $token
            ];
        } catch (\Exception $exception) {
            throw new \Exception($exception->getMessage());
        }
    }

    public function login(array $request)
    {
        $credentials = $request;
        try {
            // user login
            if (!auth()->attempt($credentials)) {
                throw new \Exception('Invalid credentials');
            }
            $user = auth()->user();
            $token = $user->createToken('User-Token')->plainTextToken;
            return [
                'user' => $user,
                'token' => $token
            ];
        } catch (\Exception $exception) {
            throw new \Exception($exception->getMessage());
        }   
    }
}