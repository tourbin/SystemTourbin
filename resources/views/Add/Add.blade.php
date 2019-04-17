@extends('layouts.admin')
@section('form')

    @if(session()->has('alert'))
        <script>
            swal({
                html: "مشخصات پرسنل جدید با موفقیت ثبت شد",
                confirmButtonText: "تاييد",
                type: 'success',
            });
        </script>
    @endif

    <br xmlns="http://www.w3.org/1999/html"/>
    <div class="portlet box blue">
        <div class="portlet-title">
            <div class="caption">
                فرم ثبت پرسنل جدید
            </div>

        </div>
        <div class="portlet-body form">
            <div class="form-body">
                <div class="form-group">
                    <form method="POST" action="{{ url('/Add') }}" class="mt-repeater form-horizontal">
                        @csrf

                        <div data-repeater-list="group-a">
                            <div data-repeater-item class="mt-repeater-item">
                                <!-- jQuery Repeater Container -->
                                <div class="mt-repeater-input">
                                    <label class="control-label">نام و نام خانوادگی</label>
                                    <br/>
                                    <input type="text" name="name" class="form-control"
                                           required/>
                                </div>
                                <div class="mt-repeater-input">
                                    <label class="control-label">شماره همراه</label>
                                    <input class="input-group form-control form-control-inline date date-picker"
                                           size="16" type="text" name="phone" required/>
                                </div>
                                <div class="mt-repeater-input">
                                    <label class="control-label">شماره ثابت</label>
                                    <input class="input-group form-control form-control-inline date date-picker"
                                           size="16" type="text" name="tel" required/>
                                </div>
                                <div class="mt-repeater-input">
                                    <label class="control-label">کد ملی</label>
                                    <input class="input-group form-control form-control-inline date date-picker"
                                           size="16" type="text" name="nationalCode" required/>
                                </div>
                                <br/>
                                <div class="mt-repeater-input">
                                    <label class="control-label">سن</label>
                                    <input class="input-group form-control form-control-inline date date-picker"
                                           size="16" type="text" name="age" required/>
                                </div>
                                <div class="mt-repeater-input">
                                    <label class="control-label">سمت</label>
                                    <input class="input-group form-control form-control-inline date date-picker"
                                           size="16" type="text" name="side" required/>
                                </div>
                                <div class="mt-repeater-input">
                                    <label class="control-label">ایمیل</label>
                                    <input class="input-group form-control form-control-inline date date-picker"
                                           size="16" type="text" name="email" required/>
                                </div>
                                <div class="mt-repeater-input">
                                    <label class="control-label">کلمه عبور</label>
                                    <input class="input-group form-control form-control-inline date date-picker"
                                           size="16" type="text" name="password" required/>
                                </div>


                            </div>
                        </div>
                        <input type="submit" data-repeater-create class="btn btn-success mt-repeater-add" value="ثبت"/>
                        </input>
                    </form>
                </div>


                <div class="portlet light bordered">

                    <div class="portlet-body">

                        <table class="table table-striped table-bordered table-hover table-checkable order-column"
                               id="sample_1">
                            <thead>
                            <tr>
                                <th>نام و نام خانوادگی</th>
                                <th>سمت</th>
                                <th>شماره همراه</th>
                                <th>سن</th>
                                <th>ایمیل</th>
                                <th>کد ملی</th>
                                <th>عملیات</th>

                            </tr>

                            </thead>
                            @foreach($user as $use)
                                <tbody>

                                <tr class="odd gradeX">
                                    <td>{{$use->name}}</td>
                                    <td>{{$use->side}}</td>
                                    <td>{{$use->phone}}</td>
                                    <td>{{$use->age}}</td>
                                    <td>{{$use->email}}</td>
                                    <td>{{$use->nationalCode}}</td>
                                    <td>
                                        <a href="{{url('/EditUser')}}/{{$use->id}}"><img
                                                    src="{{asset('/icon/icons8-available-updates-50.png')}}"
                                                    width="20"
                                                    height="20"
                                                    title="ویرایش">
                                            @if(session()->has('alertupdate'))
                                                <script>
                                                    swal({
                                                        html: "مشخصات پرسنل با موفقیت بروزرسانی شد",
                                                        confirmButtonText: "تاييد",
                                                        type: 'info',
                                                    });
                                                </script>
                                            @endif
                                        </a>
                                        <a href="{{url('/DeleteUser')}}/{{$use->id}}"><img
                                                    src="{{asset('/icon/icons8-delete-user-male-50.png')}}"
                                                    width="20" height="20" title="حذف">
                                            @if(session()->has('alertdelete'))
                                                <script>
                                                    swal({
                                                        html: "مشخصات پرسنل با موفقیت از سیستم حذف شد",
                                                        confirmButtonText: "تاييد",
                                                        type: 'error',
                                                    });
                                                </script>
                                            @endif
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>

                        </table>


                    </div>
                </div>

                <!-- END EXAMPLE TABLE PORTLET-->

            </div>
        </div>
    </div>

    <!-- BEGIN EXAMPLE TABLE PORTLET-->



@endsection




