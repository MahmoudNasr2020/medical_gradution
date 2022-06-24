@extends('company.layouts.index')

@section('content')
    <div class="col-12 p-3">
        <div class="col-12 col-lg-12 p-0 main-box">

            <div class="col-12 px-0">
                <div class="col-12 p-0 row">
                    <div class="col-12 col-lg-4 py-3 px-3">
                        <span class="fas fa-categories"></span> المحفظة
                    </div>

                    <div class="col-12 col-lg-4 p-2">
                    </div>
                </div>
                <div class="col-12 divider" style="min-height: 2px;"></div>
            </div>
            <div class="col-12 p-3" style="overflow:auto;text-align: center" >
                <h4>
                    الرصيد الكلي
                </h4>
                <span><span dir="rtl" style=" font-size:25px;color: #1abc9c">
                                {{ $total_price }} جنيه مصري
                            </span></span>
            </div>

            <div class="col-12 p-3" style="overflow:auto;text-align: center" >
                <h4>
                    الرصيد القابل للسحب
                </h4>
                <span><span dir="rtl" style=" font-size:25px;color: #1abc9c">
                                {{ $total_price - ($total_price * (settings()->commission / 100)) }} جنيه مصري
                            </span></span>
            </div>

        </div>
    </div>

@stop

