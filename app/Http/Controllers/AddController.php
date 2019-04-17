<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AddController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::get();
        return view('/Add/Add', compact('user'));
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        User::create([

            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'phone' => $request['phone'],
            'tel' => $request['tel'],
            'side' => $request['side'],
            'age' => $request['age'],
            'nationalCode' => $request['nationalCode'],


        ]);
        session()->flash('alert', 'امشخصات پرسنل جدید با موفقیت ثبت شد');
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = User::get();
        return view('/Admin/ViewTime', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function Delete(User $user)
    {
        $user->delete();
        session()->flash('alertdelete', 'مشخصات پرسنل از سیستم حذف شد');
        return redirect()->back();
    }

    public function EditUser(User $user)
    {
        return view('/Add/EditUser', compact('user'));

    }

    public function UpdateUser(Request $request, User $user)
    {
        $user->update([
            'name' => $request['name'],
            'phone' => $request['phone'],
            'tel' => $request['tel'],
            'side' => $request['side'],
            'age' => $request['age'],
            'nationalCode' => $request['nationalCode'],
        ]);
        session()->flash('alertupdate', 'مشخصات پرسنل با موفقیت بروزرسانی شد');
        return redirect()->action('AddController@index');

    }
}
