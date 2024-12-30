<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderManagementController extends Controller
{
    public function index()
    {
        return view('order-management');
    }
}
