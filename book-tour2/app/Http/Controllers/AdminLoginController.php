<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function index() {
        return view('Admin/adminlogin');
    }

    public function login(LoginRequest $request) {
        $request->authenticate();
        return redirect()->intended('admin/dashboard');
    }

    public function logout(Request $request){
        Auth::guard('user')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
    //
}
