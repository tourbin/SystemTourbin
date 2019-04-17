@extends('layouts.admin')
@section('form')
    <br xmlns="http://www.w3.org/1999/html"/>
    <div class="portlet box blue">
        <div class="portlet-title">
            <div class="caption">
                فرم ویرایش اطلاعات پرسنل
            </div>

        </div>
        <div class="portlet-body form">
            <div class="form-body">
                <div class="form-group">
                    <form method="POST" action="{{ url('/UpdateUser') }}/{{$user->id}}"
                          class="mt-repeater form-horizontal">
                        @csrf
                        {{method_field('PATCH')}}

                        <div data-repeater-list="group-a">
                            <div data-repeater-item class="mt-repeater-item">
                                <!-- jQuery Repeater Container -->
                                <div class="mt-repeater-input">
                                    <label class="control-label">نام و نام خانوادگی</label>
                                    <br/>
                                    <input type="text" name="name" class="form-control" value="{{$user->name}}"
                                           required/>
                                </div>
                                <div class="mt-repeater-input">
                                    <label class="control-label">شماره همراه</label>
                                    <input class="input-group form-control form-control-inline date date-picker"
                                           size="16" type="text" name="phone" value="{{$user->phone}}" required/>
                                </div>
                                <div class="mt-repeater-input">
                                    <label class="control-label">شماره ثابت</label>
                                    <input class="input-group form-control form-control-inline date date-picker"
                                           size="16" type="text" name="tel" value="{{$user->tel}}" required/>
                                </div>

                                <br/>
                                <div class="mt-repeater-input">
                                    <label class="control-label">سن</label>
                                    <input class="input-group form-control form-control-inline date date-picker"
                                           size="16" type="text" name="age" value="{{$user->age}}" required/>
                                </div>
                                <div class="mt-repeater-input">
                                    <label class="control-label">کد ملی</label>
                                    <input class="input-group form-control form-control-inline date date-picker"
                                           size="16" type="text" name="nationalCode" value="{{$user->nationalCode}}" required/>
                                </div>
                                <div class="mt-repeater-input">
                                    <label class="control-label">سمت</label>
                                    <input class="input-group form-control form-control-inline date date-picker"
                                           size="16" type="text" name="side" value="{{$user->side}}" required/>
                                </div>
                            </div>
                        </div>
                        <input type="submit" data-repeater-create class="btn btn-success mt-repeater-add" value="ثبت"/>
                        </input>
                    </form>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
        </div>
    </div>
    <!-- BEGIN EXAMPLE TABLE PORTLET-->
@endsection




