<?php

namespace App\Http\Controllers\Api\Driver;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\order;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function getOrderWithDate($id) {
        /** This is for get order with date
         * Date: today
         * Date: Week
         * Date: Month
         */

         // Today Order
         $today_order = order::where('driver_id',$id)
         ->whereDate('created_at',Carbon::today())
         ->get();

         $week_order = order::where('driver_id',$id)
         ->whereBetween('created_at',[Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
         ->get();

         $month_order = order::where('driver_id',$id)
         ->where('created_at', '>=', Carbon::now()->startOfMonth()->subMonth()->toDateString())
         ->get();

         $all_order = order::where('driver_id',$id)
         ->get();

         return response()->json([
             'today_order' => $today_order,
             'week_order'=>$week_order,
             'month_order'=>$month_order,
             'all_order' => $all_order
             ]);
    }
}
