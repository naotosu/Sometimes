<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Sometime;

class InputController extends Controller
{
    public function inputView()
    {
        try {
            $my_id = Auth::user()->id;

            if (isset($my_id)) {
                $sometimes = Sometime::SearchBySometime($my_id)->get();
            }
            
        } catch (\Exception $e) {
            report($e);
            session()->flash('flash_message', '使用する為には、ID登録、ログインして下さい');
            $sometimes = null;
            $my_id = null;
            return view('input', compact('sometimes', 'my_id'));
        }

        return view('input', compact('sometimes', 'my_id'));
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
        $new_data->user_id = 1;
        $new_data->save();


        /* try {
            $sometimes = Sometime::SearchBySometime()->get();

            $ = new $sometime
        } */

        $sometimes = Sometime::SearchBySometime(/* $user_id */)->get();
        return view('input', compact('sometimes'));
    }

    public function deleteExecute(Request $request)
    {
        $id = $request->input('id');
        
        try {
            $sometime = Sometime::find($id);
            $sometime->delete();
        } catch (\Exception $e) {
            report($e);
            session()->flash('flash_message', '消去を中断しました');
            return redirect('/input');
        }
        session()->flash('flash_message', '消去完了しました');
        return redirect('input');
    }
}
