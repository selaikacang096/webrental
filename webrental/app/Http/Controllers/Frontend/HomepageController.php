<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;


class HomepageController extends Controller
{
    public function index(){
        $cars = Car::all()->take(6);
        return view('frontend.homepage', compact('cars'));
    }
}
