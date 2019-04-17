@extends('layouts.admin')
@section('form')
    @if(session()->has('alertleave'))
        <script>
            swal({
                html: "درخواست شما برای مدیریت ارسال شد",
                confirmButtonText: "تاييد",
                type: 'success',
            });
        </script>
    @endif
    <br xmlns="http://www.w3.org/1999/html"/>
    <div class="portlet box blue">
        <div class="portlet-title">
            <div class="caption">
                فرم درخواست مرخصی
            </div>

        </div>
        <div class="portlet-body form">
            <div class="form-body">
                <div class="form-group">
                    <form action={{url('/Leave')}} method="post" class="mt-repeater form-horizontal"
                          enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div data-repeater-list="group-a">
                            <div data-repeater-item class="mt-repeater-item">
                                <!-- jQuery Repeater Container -->
                                <div class="mt-repeater-input">
                                    <label class="control-label">نام و نام خانوادگی</label>
                                    <br/>
                                    <input type="text" name="name" class="form-control" value="{{auth()->user()->name}}"
                                           required/>
                                </div>
                                <div class="mt-repeater-input">
                                    <label class="control-label">تقاضای</label>
                                    <input class="input-group form-control form-control-inline date date-picker"
                                           size="16" type="text" name="Demand" placeholder="تعداد روز مرخصی" required/>
                                </div>
                                <div class="mt-repeater-input">
                                    <label class="control-label">از تاریخ</label>
                                    <input class="input-group form-control form-control-inline date date-picker"
                                           size="16" type="text" name="from" required/>
                                </div>
                                <div class="mt-repeater-input">
                                    <label class="control-label">تا تاریخ</label>
                                    <input class="input-group form-control form-control-inline date date-picker"
                                           size="16" type="text" name="Uptodate" required/>
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
                                <th>مدت مرخصی</th>
                                <th>از تاریخ</th>
                                <th>تا تاریخ</th>
                                <th>وضعیت مدیریت</th>

                            </tr>

                            </thead>
                            @foreach($leave as $leav)
                                @if($leav->name == auth()->user()->name)
                                    <tbody>

                                    <tr class="odd gradeX">
                                        <td>{{$leav->name}}</td>
                                        <td>{{$leav->Demand}} روز</td>
                                        <td>{{$leav->from}}</td>
                                        <td>{{$leav->Uptodate}}</td>
                                        <td>
                                            @if($leav->Answer == "")
                                                <span
                                                        class="label label-sm label-info">در حال برسی</span>



                                            @elseif($leav->Answer == "icon/delete (2).png")
                                                <span
                                                        class="label label-sm label-danger">با درخواست شما موافقت نشده است</span>


                                            @else
                                                <span
                                                        class="label label-sm label-success">با درخواست شما موافقت شد</span>

                                            @endif

                                        </td>
                                    </tr>
                                    @endif
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




