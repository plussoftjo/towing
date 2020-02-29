<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
class RidersController extends Controller
{
    public function index() {
        $users = User::where('type','client')->get();
        return view('admin.riders.riders',[
            'users' => $users
        ]);
    }

    public function check($id) {
        $user = User::where('id',$id)->first();
        return view('admin.riders.check',[
            'user' => $user
        ]);
    }
}
