<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CarType;
class HelperController extends Controller
{
    /**
     * Index Car Type
     * @with => [Service,SubService]
     */
    public function IndexCarType() {
        return response()->json(CarType::get());
    }
}
