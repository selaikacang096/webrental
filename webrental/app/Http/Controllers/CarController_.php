<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index(){
        // return view('frontend.car');
        $cars = Car::all(); // Get all cars from the database
        return view('frontend.cars', compact('cars'));
    }

    public function show($id)
    {
        $car = Car::find($id);
        return view('cars.show', compact('car'));
    }
    public function store(Request $request)
    {
        // ...
        $car->rental_count++;
        $car->save();
        // ...
    }
}
