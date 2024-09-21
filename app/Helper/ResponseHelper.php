<?php

namespace App\Helper;
use Illuminate\Http\JsonResponse;

class ResponseHelper
{
    public static function Out($mgs,$data,$code):JsonResponse {
        return response()->json(['msg' => $mgs,'data' => $data],$code);
    }
}
