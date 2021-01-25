<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Sometime;

class InputController extends Controller
{
    public function inputView()
    {
        return view('input');
    }

    public function inputData(Request $request)
    {
        $new_data = new Sometime;
        $new_data->medicine_name = $request->input('medicine_name');
        $new_data->interval_time = $request->input('count');
        $new_data->next_time = $request->input('time_to');

        dd($new_data->interval_time);

        //$new_data->user_id


        /* try {
            $sometimes = Sometime::SearchBySometime()->get();

            $ = new $sometime
        } */

        return view('input');
    }
}
