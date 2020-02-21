<?php

namespace App\Http\Controllers\Api\Driver;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\withdrawl;
class WithdrawalController extends Controller
{
    public function store(Request $request) {
        /** store new withdrawal order */
        $withdrawal = withdrawl::create([
            'user_id' => $request->user_id,
            'uid' => $request->uid,
            'amount' => $request->amount,
            'note' => $request->note,
            'method' => $request->method
        ]);
    }
}
