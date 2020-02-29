<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
class UserRequestController extends Controller
{
    public function index() {
        $users = User::where('approved',0)->where('type','driver')->get();
        return view('admin.user_request.user_request',[
            'users' => $users
        ]);
    }

    public function check($id) {
        $user = User::where('id',$id)->first();
        return view('admin.user_request.check_request',[
            'user' => $user
        ]);
    }
    public function approve($id) {
        $user = User::where('id',$id)->update([
            'approved' => 1
        ]);
        return response()->json(['msg'=> 'approved']);
    }

    public function reject($id) {
        $user = User::where('id',$id)->update([
            'approved' => 3
        ]);
        return response()->json(['msg'=> 'approved']);
    }
}
