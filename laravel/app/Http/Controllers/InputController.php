<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InputController extends Controller
{
    public function inputView()
    {
        return view('input');
    }

    // public function input(Request $request)
    // {
    //     $medicine_name = $request->input('medicine_name');
    //     $count = $request->input('count');
    //     $time_to = $request->input('$i');

    //     try {
    //         $sometimes = Sometime::SearchBySometime()->get();

    //         $ = new $sometime
    //     }

    //     return view('input');
    // }
}
