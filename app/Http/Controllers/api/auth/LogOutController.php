<?php

namespace App\Http\Controllers\api\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogOutController extends Controller
{
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json([
            'message' => 'Logout successful',
        ]);
    }
}
