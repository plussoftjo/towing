<?php

namespace App\Http\Controllers\Api\Driver;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;
use App\driver_state;
class LocationController extends Controller
{
    public function create_location(Request $request) {
        /** Check if the user have driver _state */
        $user_id = Auth::id();
            $driver_state_count = driver_state::where('user_id',$user_id)->count();
            if($driver_state_count == 0) {
                // ** Create Driver _ state
                driver_state::create([
                    'user_id' => $user_id,
                    'latlng' => $request->latlng,
                    'state' => 'offline'
                ]);
            }else {
                /** Update Driver _state */
                $state = driver_state::where('user_id',$user_id)->value('state');
                driver_state::where('user_id',$user_id)->update([
                    'user_id' => $user_id,
                    'latlng' => $request->latlng,
                    'state' => $state
                ]);
            }
        return response()->json(['driver_state' => $driver_state_count],200);
    }

    public function change_state(Request $request) {
        $user_id = Auth::id();
        driver_state::where('user_id',$user_id)->update([
            'state' => $request->state
        ]);
    }

    public function get_drivers(Request $request) {
        $online_drivers = driver_state::where('state','online')->get();
        $online_drivers_ids = $online_drivers->pluck('user_id');
        $drivers = User::whereIn('id',$online_drivers_ids)->get();
        return response()->json(['drivers' => $drivers],200);
    }
}
