<?php

namespace App\Http\Controllers\Api\Driver;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\user_profile;
use App\driver_car;
use App\user_car;
use Intervention\Image\ImageManagerStatic as Image;
use App\driver_state;
use App\driver_images;
use App\user_image;
use App\user_company;
use App\wallet;
use Carbon\Carbon;
class AuthController extends Controller
{
    public function login(Request $request) {
        $input = $request->all();
        if(Auth::attempt(['phone' => $input['phone'],'password' => $input['password'],'type' => 'driver'])) {
            $user = Auth::User();
            $token = $user->createToken('auth')-> accessToken; #Fetch Token
            return response()->json(['token' => $token,'user' => $user],200);
        }
        return response()->json(['error' => 'Unauthorised'],401);
    }

    public function register(Request $request) {
        $user_input = $request->user_input;
        $user_profile_input = $request->user_profile;
        $driver_car_input = $request->driver_car;
        $user_images_input = $request->user_images;
        $user_car_input = $request->user_car;
        $user_company_input = $request->company_input;
        $user = User::create([
            'name' => $user_profile_input['name'],
            'phone' => $user_input['phone'],
            'password' => bcrypt($user_input['password']),
            'type' => 'driver',
            'avatar' => $user_profile_input['user_image'],
            'method' => 'none'
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
        // $services = '';
        // foreach ($driver_car_input['services'] as $service) {
        //     if($service['vaild']) {
        //         if($services == '') {
        //             $services = $service['title'];
        //         }else {
        //             $services = $services.','.$service['title'];
        //         }
        //     }
        // }


        /** Driver Car */
        $driver_car = driver_car::create([
            'user_id' => $user->id,
            'car_type' => $user_car_input['truck_type'],
            'car_no' => $user_car_input['plate_number'],
            'services' => $user_car_input['towing_type']
        ]);
        driver_state::create([
            'user_id' => $user->id,
            'latlng' => '0,0',
            'state' => 'offline'
        ]);


        $wallet = wallet::create([
            'user_id' => $user->id
        ]);

        /** Images */

        /** driver licanse image */
        if($user_profile_input['driver_licanse'] !== '') {
            user_image::create([
                'user_id' => $user->id,
                'type' => 'driver_licanse',
                'image' => $user_profile_input['driver_licanse']
            ]);
        }


        user_company::create([
            'user_id' => $user->id,
            'name' => $user_company_input['name'],
            'city' => $user_company_input['city'],
            'owner_name' => $user_company_input['owner_name'],
            'phone' => $user_company_input['phone'],
            'state' => $user_company_input['state'],
            'tax_id' => $user_company_input['tax_id'],
            'zip_code' => $user_company_input['zip_code'],
        ]);
        //** Truck image */
        foreach ($user_images_input['truckImage'] as $image) {
            # code...
            user_image::create([
                'user_id' => $user->id,
                'type' => 'truck_image',
                'image' => $image
            ]);
        }

        //** plate number image */
        foreach ($user_images_input['plateNumber'] as $image) {
            # code...
            user_image::create([
                'user_id' => $user->id,
                'type' => 'plate_number',
                'image' => $image
            ]);
        }

        //** registration image */
        foreach ($user_images_input['regImage'] as $image) {
            # code...
            user_image::create([
                'user_id' => $user->id,
                'type' => 'reg_image',
                'image' => $image
            ]);
        }

        //** registration image */
        foreach ($user_images_input['insImage'] as $image) {
            # code...
            user_image::create([
                'user_id' => $user->id,
                'type' => 'ins_image',
                'image' => $image
            ]);
        }

        $user_data = User::where('id',$user->id)->first();

        $token = $user->createToken('auth')-> accessToken;
        return response()->json(['token'=>$token,'user'=>$user_data]);
    }

    public function auth() {
        $user = Auth::User();
        if($user->type == 'driver') {
            return response()->json($user);
        }
        return response()->json(['error' => 'Unauthorised'],401);
    }

    public function testImage(Request $request) {
        $image = 'data:image/jpg;base64,'.$request->get('image');
        $imageName = Carbon::now()->timestamp . uniqid() . '.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
        Image::make($image)->save(public_path('images/').$imageName);
        return response()
            ->json(['image'=>$imageName]);
    }

    public function upload_image(Request $request) {
        $image = 'data:image/jpg;base64,'.$request->get('image');
        $imageName = Carbon::now()->timestamp . uniqid() . '.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
        Image::make($image)->save(public_path(('images/driver/'.$request->type).'/'.$imageName));

        $driver_images = driver_images::create([
            'user_id'=>$request->user_id,
            'type' => $request->type,
            'image'=>'images/driver/'.$request->type.'/'.$imageName
        ]);
    }

    public function upload_avatar(Request $request) {
        $image = 'data:image/jpg;base64,'.$request->get('image');
        $imageName = Carbon::now()->timestamp . uniqid() . '.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
        Image::make($image)->save(public_path(('images/driver/avatar/').$imageName));

        User::where('id',$request->user_id)->update([
            'avatar' => 'images/driver/avatar/'.$imageName
        ]);

        return response()->json(['image'=>'images/driver/avatar/'.$imageName]);
    }

    public function update_token(Request $request) {
        User::where('id',$request->id)->update([
            'notifaction_token' => $request->token
        ]);
    }

    public function update_wallet(Request $request) {
        $net = wallet::where('user_id',$request->id)->value('net');
        $all_time = wallet::where('user_id',$request->id)->value('all_time');
        $new_net = $net + $request->price;
        $new_all_time = $all_time + $request->price;
        $wallet = wallet::where('user_id',$request->id)->update([
            'net' => $new_net,
            'all_time' => $new_all_time
        ]);
    }

    public function change_state_to_busy($id) {
        driver_state::where('user_id',$id)->update([
            'state'=>'busy'
        ]);
    }
    
    public function change_state_to_online($id) {
        driver_state::where('user_id',$id)->update([
            'state' => 'online'
        ]);
    }

}
