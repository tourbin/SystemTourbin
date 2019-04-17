@extends('layouts.admin')
@section('form')
    <div class="portlet box blue">
        <div class="portlet-body form">
            <div class="form-body">
                <div class="portlet light bordered">

                    <div class="portlet-body">

                        <table class="table table-striped table-bordered table-hover table-checkable order-column"
                               id="sample_1">
                            <thead>
                            <tr>
                                <th>نام و نام خانوادگی</th>
                                <th>سن</th>
                                <th>شماره همراه</th>
                                <th>شماره ثابت</th>
                                <th>کد ملی</th>
                                <th>انلاین</th>
                                <th>عملیات</th>

                            </tr>

                            </thead>
                            <tbody>
                            @foreach($user as $use)
                                <tr class="odd gradeX">
                                    <td>{{$use->name}}</td>
                                    <td>{{$use->age}}</td>
                                    <td>{{$use->phone}}</td>
                                    <td>{{$use->tel}}</td>
                                    <td>{{$use->nationalCode}}</td>
                                    <td>
                                        @if(Auth::check())
                                            <img src="{{asset('/icon/active.png')}}" width="20" height="20"
                                                 title="فعال">
                                        @else
                                            <img src="{{asset('/icon/dactive.png')}}" width="20" height="20"
                                                 title="غیرفعال">

                                        @endif


                                    </td>
                                    <td>
                                        <a href="{{asset('/ViewTimeFull')}}/{{$use->id}}"><img
                                                    src="{{asset('/icon/icons8-todo-list-50 (1).png')}}"
                                                    title="ساعت کاری پرسنل" width="30"
                                                    height="30"><br/></a>
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




