<?php
Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::resource('Leave', 'LeaveController');
Route::resource('Time', 'TimeRecordingController');
Route::resource('Add', 'AddController');
Route::get('/home', 'HomeController@index')->name('home');


Route::get('/AdminSuccess/{leave}', 'RequstLeaveController@AdminSuccess');
Route::get('/AdminNoSuccess/{leave}', 'RequstLeaveController@AdminNoSuccess');
Route::get('/ViewTimeFull/{leave}', 'RequstLeaveController@ViewTimeFull');
Route::get('/','RequstLeaveController@home');





