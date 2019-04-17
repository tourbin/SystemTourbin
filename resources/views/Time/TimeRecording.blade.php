@extends('layouts.admin')
@section('form')
    @if(session()->has('TeleWork'))
        <script>
            swal({
                html: "اطلاعات دورکاری شما با موفقیت در سیستم ثبت شد",
                confirmButtonText: "تاييد",
                type: 'success',
            });
        </script>
    @endif
    <div class="portlet box blue ">
        <div class="portlet-title">
            <div class="caption">
                فرم ثبت ساعات دور کاری پرسنل
            </div>
        </div>
        <div class="portlet-body form ">
            <div class="form-body ">
                <div class="form-group">
                    <form action="{{url('/Telework')}}" method="post" class="mt-repeater form-horizontal">
                        {{csrf_field()}}
                        <div data-repeater-list="group-a">
                            <div data-repeater-item class="mt-repeater-item">
                                <div class="row">
                                    <div class="col-xs-6 col-sm-2">
                                        <label class="control-label">ساعت شروع</label>
                                        <br/>
                                        <input class="input-group form-control form-control-inline date date-picker"
                                               size="16" type="text" name="Start" required/>
                                    </div>
                                    <div class="col-xs-6 col-sm-2">
                                        <label class="control-label">ساعت پایان</label>
                                        <br/>
                                        <input class="input-group form-control form-control-inline date date-picker"
                                               size="16" type="text" name="End" required/>
                                    </div>
                                    <br/>


                                    <textarea rows="2" cols="80" name="Description"
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
                        <th>ساعت شروع</th>
                        <th>ساعت پایان</th>
                        <th>مدت زمان</th>
                        <th>توضیحات</th>
                    <tfoot>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td style="color: red">جمع مجموع ساعات دورکاری:</td>
                        <td></td>
                    </tr>
                    </tfoot>
                    </tr>
                    </thead>
                    @foreach($Telework as $tele)
                        @if($tele->id == auth()->user()->id)
                            <tbody>
                            <tr>
                                <td>
                                </td>
                                <td>{{Verta::instance($tele->created_at)->format('Y-n-j')}}</td>
                                <td>{{$tele->Start}}</td>
                                <td>{{$tele->End}}</td>

                                <td>
                                    @if($tele->Leaveclock == "")
                                        0 ساعت
                                    @else
                                        {{$tele->Leaveclock}}  ساعت
                                    @endif

                                </td>
                                <td>
                                    @if($tele->Description == "")
                                        <span
                                                class="label label-sm label-success">بدون توضیح</span>
                                    @else
                                        <span
                                                class="label label-sm label-danger">{{$tele->Description}}</span>

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



