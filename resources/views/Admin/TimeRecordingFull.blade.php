@extends('layouts.admin')
@section('form')
    <div class="portlet box blue ">
        <div class="portlet-title">
            <div class="caption">
                ساعات کاری پرسنل در ماه
            </div>
        </div>
        <div class="portlet-body form ">
            <div class="form-body ">
                <table class="table table-hover table-bordered results">
                    <thead>
                    <tr>
                        <th>روز</th>
                        <th>تاریخ</th>
                        <th>زمان ورود</th>
                        <th>زمان خروج</th>
                        <th>مرخصی ساعتی</th>
                        <th>تاخیر</th>
                        <th>مجموع ساعت کاری</th>
                        <th>توضیحات</th>
                    <tfoot>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td style="color: red">جمع مرخصی های ساعتی:</td>
                        <td style="color: red">جمع تاخیر:</td>
                        <td style="color: red">جمع مجموع ساعات کاری:</td>
                        <td></td>
                    </tr>
                    </tfoot>
                    </tr>
                    </thead>
                    @foreach($leave as $leav)
                        @if($user->id == $leav->id)
                            <tbody>
                            <tr>
                                <td></td>
                                <td>{{Verta::instance($leav->created_at)->format('Y-n-j')}}</td>
                                <td>{{$leav->timein}}</td>
                                <td>{{$leav->timeout}}</td>

                                <td>
                                    @if($leav->Leaveclock == "")
                                        0 ساعت
                                    @else
                                        {{$leav->Leaveclock}}  ساعت
                                    @endif

                                </td>
                                <td>{{$leav->Delay}} ساعت</td>
                                <td></td>


                                <td>

                                    @if($leav->text == "")
                                        <span
                                                class="label label-sm label-success">بدون توضیح</span>
                                    @else
                                        <span
                                                class="label label-sm label-danger">{{$leav->text}}</span>

                                    @endif

                                </td>


                            </tr>

                            </tbody>
                        @endif
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection



