<?php

namespace App\Http\Controllers\Api\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Validator;
use App\user_profile;
use App\user_car;
use App\car_type;
use App\user_card;
use App\user_image;
use Auth;
class AuthController extends Controller
{
    // Register ->> api client
    public function register(Request $request) {
        /** Register User Input */
        $user_input = $request->user_input;
        $user_card_input = $request->user_card;
        $user_profile_input = $request->user_profile;
        $user_car_input = $request->user_car;
        // Create User
        $user = User::create([
            'name' => $user_profile_input['name'],
            'phone' => $user_input['phone'],
            'password' => bcrypt($user_input['password']),
            'type' => 'client',
            'avatar' => $user_profile_input['user_image'],
            'method' => $user_input['method']
        ]);

        /** User Profile */
        $user_profile = user_profile::create([
            'country' => $user_profile_input['country'],
            'city' => $user_profile_input['city'],
            'state' => $user_profile_input['state'],
            'address' => $user_profile_input['address'],
            'zip' => $user_profile_input['zip'],
            'user_id'=> $user->id
        ]);

        /** User Car */
        $user_car = user_car::create([
            'model' => $user_car_input['model'],
            'car_make' => $user_car_input['car_make'],
            'car_model' => $user_car_input['car_model'],
            'car_color' => $user_car_input['truck_color'],
            'user_id' => $user->id
        ]);

        if($request->have_card) {
            $user_card = user_card::create([
                'number' => $user_card_input['number'],
                'date' => $user_card_input['expiry'],
                'cvc' => $user_card_input['cvc'],
                'user_id' => $user->id
            ]);
        }

         /** Images */

        /** driver licanse image */
        if($user_profile_input['driver_licanse'] !== '') {
            user_image::create([
                'user_id' => $user->id,
                'type' => 'driver_licanse',
                'image' => $user_profile_input['driver_licanse']
            ]);
        }

        $token = $user->createToken('auth')-> accessToken;
        $user_data = User::where('id',$user->id)->first();
        return response()->json(['token'=>$token,'user'=>$user_data]);
    }

    public function login(Request $request) {
        $input = $request->all();
        if(Auth::attempt(['phone' => $input['phone'],'password' => $input['password'],'type' => 'client'])) {
            $user = Auth::User();
            $token = $user->createToken('auth')-> accessToken; #Fetch Token
            return response()->json(['token' => $token,'user' => $user],200);
        }
        return response()->json(['error' => 'Unauthorised'],401);
    }

    public function auth() {
        $user = Auth::User();
        if($user->type == 'client') {
            return response()->json($user);
        }
        return response()->json(['error' => 'Unauthorised'],401);
    }

    public function _add_car(Request $request) {
        $user_car = user_car::create([
            'model' => $request->model,
            'car_make' => $request->car_make,
            'car_model' => $request->car_model,
            'car_color' => $request->car_color,
            'user_id' => $request->user_id,
        ]);
        return response()->json($user_car);
    }

    public function _test_user(Request $request) {
        return response()->json(User::where('id',2)->first());
    }
}
