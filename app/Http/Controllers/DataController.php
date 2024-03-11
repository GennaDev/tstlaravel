<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataController extends Controller
{
    public function fetchData()
    {
        $data = ["message" => "Привет, это данные с сервера!"];
        return response()->json($data);
    }
}
