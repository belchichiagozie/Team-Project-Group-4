<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminLoginAPIController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'Email' => ['required', 'email'],
            'Passkey' => ['required'],
        ]);

        $admin = Admin::where('Email', $credentials['Email'])->first();

        if ($admin && Hash::check($credentials['Passkey'], $admin->Passkey)) {
            $request->session()->regenerate();

            $token = $admin->createToken('BookTourAdmin')->plainTextToken;
    
            return response()->json([
                'success' => true,
                'message' => 'Login successful',
                'token' => $token,
            ]);


        }

        return response()->json([
            'success' => false,
            'message' => 'The provided credentials do not match our records.',
        ], 401);
    }
    
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'success' => true,
            'message' => 'Logout successful',
        ]);
    }

}
