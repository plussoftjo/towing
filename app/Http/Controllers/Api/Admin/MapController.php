<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\driver_state;
class MapController extends Controller
{
    public function index() {
        $states = driver_state::where('state','online')->get();
        return view('admin.map.index',[
            'states' => $states
        ]);
    }
}
