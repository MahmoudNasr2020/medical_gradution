@extends('dashboard.layouts.index')

@section('content')
    <div class="col-12 p-3">
        <div class="col-12 col-lg-12 p-0 main-box">

            <div class="col-12 px-0">
                <div class="col-12 p-0 row">
                    <div class="col-12 col-lg-4 py-3 px-3">
                        <span class="fas fa-categories"></span>اتصل بنا
                    </div>
                    <div class="col-12 col-lg-4 p-2">
                    </div>
                </div>
                <div class="col-12 divider" style="min-height: 2px;"></div>
            </div>

            <div class="col-12 p-3" style="overflow:auto">
                <div class="col-12 p-0" >
                    الاسم : {{ $data->name }}
                </div>
            </div>

            <div class="col-12 p-3" style="overflow:auto">
                <div class="col-12 p-0" >
                    الايميل: {{ $data->email }}
                </div>
            </div>

            <div class="col-12 p-3" style="overflow:auto">
                <div class="col-12 p-0" >
                    رقم الهاتف: {{ $data->mobile }}
                </div>
            </div>

            <div class="col-12 p-3" style="overflow:auto">
                <div class="col-12 p-0" >
                    الرسالة : {{ $data->message }}
                </div>
            </div>
        </div>
    </div>
@stop

