<?php

namespace App\Http\Controllers;

use App\Helper\ResponseHelper;
use App\Models\Car;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\view\view;

class CarController extends Controller
{
    function carFormPage():view
    {
        return view('pages.Dashboard.car-page');
    }
    function carList(Request $request)
    {
        return Car::all();
//        $user_id=$request->header('id');
//        return Car::where('user_id',$user_id)->get();
    }
    function carAddForm(Request $request)
    {
//        dd($request->all());
        // Prepars File Name & path
        $user_id=$request->header('id');
        $img=$request->file('image');

        $t=time();
        $file_name=$img->getClientOriginalName();
        $img_name="{$user_id}-{$t}-{$file_name}";  // {$user_id}-{$t}-{$file_name}
        $img_url="uploads/{$img_name}";

        // Upload File
        $img->move(public_path('uploads/'),$img_name);


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
        $car_id=$request->input('id');
        $filePath=$request->input('file_path');
        File::delete($filePath);
        return Car::where('id', $car_id)->delete();
    }
    function carById(Request $request)
    {
        $user_id=$request->header('id');
        $car_id=$request->input('id');
        return Car::where('id', $car_id)->where('user_id', $user_id)->first();
    }

    function CarUpdate(Request $request)
    {
//
        // Prepars File Name & path
        $user_id=$request->header('id');
        $car_id=$request->input('id');
        if($request->hasFile('image')){
            $img=$request->file('image');

            $t=time();
            $file_name=$img->getClientOriginalName();
            $img_name="{$user_id}-{$t}-{$file_name}";  // {$user_id}-{$t}-{$file_name}
            $img_url="upload/car/{$img_name}";
            // Upload File
            $img->move(public_path('upload/car/'),$img_name);

            // Delete Old file
            $filePath=$request->input('file_path');
            File::delete($filePath);

            // Update car
             return Car::where('id', $car_id)->where('user_id', $user_id)->update([
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
        else {
            return Car::where('id', $car_id)->where('user_id', $user_id)->update([
                'name' => $request->input('name'),
                'brand' => $request->input('brand'),
                'model' => $request->input('model'),
                'year' => $request->input('year'),
                'car_type' => $request->input('car_type'),
                'daily_rent_price' => $request->input('daily_rent_price'),
                'availability' => $request->input('availability')
            ]);
        }

    }


}
