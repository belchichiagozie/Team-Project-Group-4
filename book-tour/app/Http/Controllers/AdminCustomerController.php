<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminCustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::where('Customer_ID', 1)->get();
        return view('Admin/adminc', ['customers' => $customers]);
    }
    //
}
