<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function apiResponse($data, $message = null, $code = 200){
        $response = [];

        if($data)
            $response["data"] = $data;

        if($message)
            $response["message"] = $message;

        return response()->json($response, $code);
    }
}
