<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    function carFormPage()
    {
        return view('pages.Dashboard.car-page');
    }
    function carAddForm(Request $request)
    {
        // Prepars File Name & path
        $img=$request->file('image');

        $t=time();
        $file_name=$img->getClientOriginalName();
        $img_name="{$t}-{$file_name}";  // {$user_id}-{$t}-{$file_name}
        $img_url="upload/car/{$img_name}";

        // Upload File
        $img->move(public_path('upload/car/'),$img_name);


        return Car::create([
            'name' => $request->input('name'),
            'brand' => $request->input('brand'),
            'model' => $request->input('model'),
            'year' => $request->input('year'),
            'car_type' => $request->input('car_type'),
            'daily_rent_price' => $request->input('daily_rent_price'),
            'availability' => $request->input('availability'),
            'image' => $img_url

        ]);
    }
}
