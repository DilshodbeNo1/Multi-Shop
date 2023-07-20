<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class ClientController extends Controller
{
    public function dashboard()
    {
        $id=auth()->guard('client')->id();
        $orders=Order::where('client_id', $id)->paginate(8);
        return view('sections.client-side.profile', compact('orders'));
    }   
}
