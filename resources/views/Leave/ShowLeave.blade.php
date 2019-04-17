@extends('layouts.admin')
@section('form')
    @if(session()->has('error'))
        <script>
            swal({
                html: "شما با درخواست مرخصی پرسنل موافقت نکردید",
                confirmButtonText: "تاييد",
                type: 'error',
            });
        </script>
    @endif
    @if(session()->has('success'))
        <script>
            swal({
                html: "شما با درخواست مرخصی پرسنل موافقت کردید",
                confirmButtonText: "تاييد",
                type: 'success',
            });
        </script>
    @endif
    <br xmlns="http://www.w3.org/1999/html"/>
    <div class="portlet box blue">
        <div class="portlet-title">
            <div class="caption">
                نمایش درخواست های مرخصی پرسنل
            </div>

        </div>
        <div class="portlet-body form">
            <div class="form-body">
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
                                <th>عملیات</th>

                            </tr>

                            </thead>
                            @foreach($leave as $leav)
                                @if($leav->Answer == "")
                                    <tbody>

                                    <tr class="odd gradeX">
                                        <td>{{$leav->name}}</td>
                                        <td>{{$leav->Demand}} روز</td>
                                        <td>{{$leav->from}}</td>
                                        <td>{{$leav->Uptodate}}</td>
                                        <td>
                                            <a href="{{url('/AdminSuccess')}}/{{$leav->id}}"><img
                                                        src="{{asset('/icon/icons8-checked-checkbox-50.png')}}"
                                                        title="تایید شده" width="30"
                                                        height="30">

                                            </a>
                                            <a href=" {{url('/AdminNoSuccess')}}/{{$leav->id}}"><img
                                                        src="{{asset('/icon/icons8-indeterminate-checkbox-50.png')}}"
                                                        title="تایید نشده" width="30"
                                                        height="30">

                                            </a>
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




