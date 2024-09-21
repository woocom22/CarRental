<?php

namespace App\Http\Controllers;

use App\Helper\ResponseHelper;
use App\Models\Car;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CarController extends Controller
{
    function carFormPage()
    {
        return view('pages.Dashboard.car-page');
    }
    function carList(Request $request)
    {
        return Car::all();
    }
    function carAddForm(Request $request)
    {
        dd($request->all());
        // Prepars File Name & path
        $user_id=$request->header('id');
        $img=$request->file('image');

        $t=time();
        $file_name=$img->getClientOriginalName();
        $img_name="{$user_id}-{$t}-{$file_name}";  // {$user_id}-{$t}-{$file_name}
        $img_url="upload/car/{$img_name}";

        // Upload File
        $img->move(public_path('upload/car/'),$img_name);


       Car::create([
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

    function carDelete(Request $request)
    {

    }


}
