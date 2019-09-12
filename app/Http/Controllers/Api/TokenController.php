<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TokenController extends Controller
{
    //
    public function appToken(Request $request, User $user)
    {
        $token = User::appToken();
        return response()->json(['status' => 1, 'token' => $token,], 200);
    }
}
