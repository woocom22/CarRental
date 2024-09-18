<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rental;

class RentalController extends Controller
{
    function rentalPage()
    {
        return view('pages.Dashboard.rental-page');
    }
    function rentalAddForm(Request $request){
//        dd($request->all());
        return Rental::create([
            'start_date'=>$request->input('start_date'),
            'end_date'=>$request->input('end_date'),
            'total_cost'=>$request->input('total_cost'),
        ]);
    }
}
