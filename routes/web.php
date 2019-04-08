<?php
Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::resource('Leave', 'LeaveController');
Route::resource('Time', 'TimeRecordingController');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/Add', 'AddController@index');






