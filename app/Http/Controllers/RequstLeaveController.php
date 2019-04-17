<?php

namespace App\Http\Controllers;

use App\Leave;
use App\TimeRecording;
use App\User;
use Illuminate\Http\Request;

class RequstLeaveController extends Controller
{
    public function AdminSuccess(Leave $leave)
    {
        $Paid = 'icon/check.png';
        $leave->update([
            'Answer' => $Paid,
        ]);
        session()->flash('success', 'درخواست مرخصی تایید شد');
        return redirect()->back();
    }

    public function AdminNoSuccess(Leave $leave)
    {
        $Paid = 'icon/delete (2).png';
        $leave->update([
            'Answer' => $Paid,
        ]);
        session()->flash('error', 'درخواست مرخصی تایید نشد');
        return redirect()->back();
    }

    public function ViewTimeFull(User $user)
    {
        $leave = TimeRecording::get();
        return view('/Admin/TimeRecordingFull', compact('leave','user'));
    }

    public function home()
    {
        return view('/auth/login');
    }
}