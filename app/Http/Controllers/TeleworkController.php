<?php

namespace App\Http\Controllers;

use App\Telework;
use Illuminate\Http\Request;

class TeleworkController extends Controller
{
    public function AddTelework(Request $request)
    {
        $user_id = auth()->user()->id;
        $user_name = auth()->user()->name;
        Telework::create([
            'user_name' => $user_name,
            'Start' => $request['Start'],
            'End' => $request['End'],
            'Description' => $request['Description'],
            'user_id' => $user_id,
        ]);
        session()->flash('Telework', 'اطلاعات دورکاری شما با موفقست در سیستم ثبت شد');
        return redirect()->back();
    }

    public function ShowTelework ()
    {
        $Telework=Telework::get();
        return view('/Time/TimeRecording',compact('Telework'));
    }
}
