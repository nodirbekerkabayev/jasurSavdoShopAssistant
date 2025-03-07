<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request): \Illuminate\Http\JsonResponse
    {
        $validator = $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);
        $name = $validator['name'];
        $password = $validator['password'];
        $user = User::query()->where('name', $name)->where('password', $password)->first();

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }
        $token = $user->createToken('token')->plainTextToken;
        return response()->json(['message' => 'Login successfully', 'token' => $token]);
    }
}
