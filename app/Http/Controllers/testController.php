<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\CarType;
class testController extends Controller
{
    public function index() {
        return response()->json(CarType::get());
    }
}
