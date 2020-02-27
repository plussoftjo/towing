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
}
