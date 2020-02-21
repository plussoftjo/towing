<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Carbon\Carbon;
class imageController extends Controller
{
    public function store(Request $request){
        /** Handle upload images */
        $image = $request->get('image');
        $imageName = Carbon::now()->timestamp . uniqid() . '.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
        if($request->cam_type == 'camera') {
            Image::make($image)->rotate(-90)->save(public_path(('images/driver_image_bucket/').$imageName));
        }else {
            Image::make($image)->save(public_path(('images/driver_image_bucket/').$imageName));
        }

        return response()->json(['image' => 'images/driver_image_bucket/'.$imageName]);
    }
}
