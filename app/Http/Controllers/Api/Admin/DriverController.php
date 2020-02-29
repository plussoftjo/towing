<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
class DriverController extends Controller
{
    public function index() {
        $users = User::where('approved',1)->where('type','driver')->get();
        return view('admin.drivers.drivers',[
            'users' => $users
        ]);
    }

    public function check($id) {
        $user = User::where('id',$id)->first();
        return view('admin.drivers.check',[
            'user' => $user
        ]);
    }
}
