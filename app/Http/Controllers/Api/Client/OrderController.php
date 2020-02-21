<?php

namespace App\Http\Controllers\Api\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\order;
use App\order_info;
use Auth;
use Api\User;
class OrderController extends Controller
{
    //** Store  */
    public function store(Request $request) {
        $order = order::where('uuid',$request->uuid)->count();
        if($order == 0) {
            /** Create order */
            $order = order::create([
                'user_id' => $request->user_id,
                'uuid' => $request->uuid,
                'driver_id' => $request->driver_id,
                'state' => $request->state
            ]);
            $order_info = order_info::create([
                'order_id' => $order->id,
                'car_type' => $request->car_type,
                'service' => $request->service,
                'sub_service' => $request->sub_service,
                'amount' => $request->amount,
                'latlng_user' => $request->dropoff_location,
                'latlng_distance' => $request->pickup_coords
            ]);
            return response()->json(['order_id' => $order->id]);
        }
    }

    public function change_order_state(Request $request) {
        $order = order::where('id',$request->order_id)->update([
            'state' => $request->state
        ]);
    }

    public function change_state_with_uuid(Request $request) {
        $order = order::where('uuid',$request->uuid)->update([
            'state' => $request->state
        ]);
    }

    public function get_state_with_uuid(Request $request) {
        $order = order::where('uuid',$request->uuid)->first();
        return response()->json($order);
    }


    public function get_current_order_from_users_ids(Request $request) {
        $order = order::where('user_id',$request->user_id)->where('driver_id',$request->driver_id)->where('state',$request->state)->first();
        return response()->json($order);
    }

    public function get_order_with_id(Request $request) {
        $order = order::where('id',$request->order_id)->first();
        return response()->json($order);
    }

    public function change_state_to_tow(Request $request) {
        $order = order::where('user_id',$request->user_id)->where('driver_id',$request->driver_id)->where('state',1)->update([
            'state' => 2
        ]);
    }

    public function change_state_to_three(Request $request) {
        $order = order::where('user_id',$request->user_id)->where('driver_id',$request->driver_id)->where('state',2)->update([
            'state' => 3
        ]);
    }

    public function change_state_to_four(Request $request) {
        $order = order::where('id',$request->order_id)->update([
            'state' => 4
        ]);
    }

    public function check_state_has_uuid(Request $request) {
        $order = order::where('uuid',$request->uuid)->count();
        if($order == 0) {
            return response()->json(['has' => false]);
        }else {
            return response()->json(['has' => true]);
        }
    }
}
