<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\order;
class OrderController extends Controller
{
    public function index() {
        $orders = order::get();
        return view('admin.orders.orders',[
            'orders'=>$orders
        ]);
    }
}
