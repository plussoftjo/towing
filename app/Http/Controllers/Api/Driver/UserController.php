<?php

namespace App\Http\Controllers\Api\Driver;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Carbon\Carbon;
use Intervention\Image\ImageManagerStatic as Image;
class UserController extends Controller
{
    /** Change Image from settings */
    public function change_image(Request $request) {
        $image = 'data:image/jpg;base64,'.$request->get('image');
        $imageName = Carbon::now()->timestamp . uniqid() . '.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
        Image::make($image)->rotate(90)->save(public_path(('images/driver/avatar/').$imageName));
        User::where('id',$request->user_id)->update([
            'avatar' => 'images/driver/avatar/'.$imageName
        ]);

        return response()->json(['image' => 'images/driver/avatar/'.$imageName]);
    }

    /** Change stander user information */
    public function update_user(Request $request) {
        User::where('id',$request->user_id)->update([
            'name' => $request->name,
            'phone' => $request->phone
        ]);
    }

    public function update_password(Request $request) {
        $input = $request->all();
        if(Auth::attempt(['phone' => $input['phone'],'password' => $input['password']])) {
            User::where('id',$request->user_id)->update([
                'password' => bcrypt($request->password)
            ]);
            return response()->json(['success' => true],200);
        }
        return response()->json(['success' => false],401);
    }
}
