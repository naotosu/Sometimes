<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Sometime;

class InputController extends Controller
{
    public function inputView()
    {
        $sometimes = Sometime::SearchBySometime(/* $user_id */)->get();
        return view('input', compact('sometimes'));
    }

    public function inputData(Request $request)
    {
        $new_data = new Sometime;
        $new_data->medicine_name = $request->input('medicine_name');
        $new_data->interval_time = $request->input('sometime');
        $time_to = new Carbon($request->input('time_to'));
        $now = \Carbon\Carbon::now();

        if ($time_to <= $now) {
            $time_to->addDays(1);
        }

        $new_data->next_time = $time_to;
        $new_data->user_id = 5;
        $new_data->save();


        /* try {
            $sometimes = Sometime::SearchBySometime()->get();

            $ = new $sometime
        } */

        $sometimes = Sometime::SearchBySometime(/* $user_id */)->get();
        return view('input', compact('sometimes'));
    }
}
