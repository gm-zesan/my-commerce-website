<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class AdminOrderController extends Controller
{
    public function index(){
        return view('admin.order.index',['orders'=>Order::orderBy('id','desc')->get()]);
    }
}
