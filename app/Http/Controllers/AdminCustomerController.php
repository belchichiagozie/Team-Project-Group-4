<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AdminCustomerController extends Controller
{
    public function index()
    {
        $customers = User::where('id', 1)->get();
        return view('Admin/adminc', ['customers' => $customers]);
    }
    //
}
