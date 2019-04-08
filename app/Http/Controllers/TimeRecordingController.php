<?php

namespace App\Http\Controllers;

use App\TimeRecording;
use App\User;
use Illuminate\Http\Request;

class TimeRecordingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Time = TimeRecording::get();
        $clock = TimeRecording::count();
//        $clocknum = Item::count();
        return view('/Time/TimeRecording', compact('Time','clock'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

//        $t3=($request['timeout']-12)+($request['timein']);
        $Delay = $request['timein'] - 9;
        $Daily1 = $request['timein'];
        $Daily2 = $Delay - $Daily1;
        TimeRecording::create([
            'name'=>auth()->user()->name,
            'timein' => $request['timein'],
            'timeout' => $request['timeout'],
            'Leaveclock' => $request['Leaveclock'],
            'text' => $request['text'],
            'Delay' => $Delay,
            'Daily' => $Daily2,
        ]);
        session()->flash('alert', 'ثبت ساعت ورود و خروج امروز شما با موفقیت ثبت شد');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function ViewTime()
    {
        $show=User::get();
        return view('/Admin/ViewTime',compact('show'));

    }
}
