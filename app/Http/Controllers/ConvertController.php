<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class ConvertController extends Controller
{
    public function store(Request $request){;

        return response()->json([
            'message' => 'Hello World',
            'data' =>  $request->getContent()
        ]);
    }
}

