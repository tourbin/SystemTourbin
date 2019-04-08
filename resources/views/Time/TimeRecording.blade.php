@extends('layouts.admin')
@section('form')
    <div class="portlet box blue ">
        <div class="portlet-title">
            <div class="caption">
                ثبت ساعت ورود و خروج
            </div>
        </div>
        <div class="portlet-body form ">
            <div class="form-body ">
                <div class="form-group">
                    <form action="{{url('/Time')}}" method="post" class="mt-repeater form-horizontal">
                        {{csrf_field()}}
                        <div data-repeater-list="group-a">
                            <div data-repeater-item class="mt-repeater-item">
                                <div class="row">
                                    <div class="col-xs-6 col-sm-2">
                                        <label class="control-label">ساعت ورود</label>
                                        <br/>
                                        <input class="input-group form-control form-control-inline date date-picker"
                                               size="16" type="text" name="timein" required/>
                                    </div>
                                    <div class="col-xs-6 col-sm-2">
                                        <label class="control-label">ساعت خروج</label>
                                        <br/>
                                        <input class="input-group form-control form-control-inline date date-picker"
                                               size="16" type="text" name="timeout" required/>
                                    </div>
                                    <div class="col-xs-6 col-sm-2">
                                        <label class="control-label">مرخصی ساعتی</label>
                                        <br/>
                                        <input class="input-group form-control form-control-inline date date-picker"
                                               size="16" type="text" name="Leaveclock"/>
                                    </div>

                                    <br/>


                                    <textarea rows="2" cols="80" name="text"
                                              placeholder="لطفا متن خود را وارد کنید"></textarea>

                                </div>
                            </div>
                        </div>
                        <input type="submit" data-repeater-create class="btn btn-success mt-repeater-add" value="ثبت"/>
                        </input>
                    </form>
                </div>

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
                    @foreach($Time as $tim)
                        @if($tim->name == auth()->user()->name)
                            <tbody>
                            <tr>
                                <td></td>
                                <td>{{Verta::instance($tim->created_at)->format('Y-n-j')}}</td>
                                <td>{{$tim->timein}}</td>
                                <td>{{$tim->timeout}}</td>

                                <td>
                                    @if($tim->Leaveclock == "")
                                        0 ساعت
                                    @else
                                        {{$tim->Leaveclock}}  ساعت
                                    @endif

                                </td>
                                <td>{{$tim->Delay}} ساعت</td>
                                <td></td>


                                <td>

                                    @if($tim->text == "")
                                        <span
                                                class="label label-sm label-success">بدون توضیح</span>
                                    @else
                                        <span
                                                class="label label-sm label-danger">{{$tim->text}}</span>

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



