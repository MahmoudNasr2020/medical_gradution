@extends('company.layouts.index')

@section('content')
    <div class="col-12 p-3">
        <div class="col-12 col-lg-12 p-0 main-box">

            <div class="col-12 px-0">
                <div class="col-12 p-0 row">
                    <div class="col-12 col-lg-4 py-3 px-3">
                        <span class="fas fa-categories"></span> المنتجات المباعة
                    </div>

                    <div class="col-12 col-lg-4 p-2">
                    </div>
                </div>
                <div class="col-12 divider" style="min-height: 2px;"></div>
            </div>

            <div class="col-12 p-3" style="overflow:auto">
                <div class="col-12 p-0" >

                    @if(count($data_success)>0)
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>

                                <th style="text-align: center">#</th>
                                <th style="text-align: center">اسم المنتج</th>
                                <th style="text-align: center">الكمية المباعة</th>
                                <th style="text-align: center">سعر المنتج</th>
                                <th style="text-align: center">سعر الكمية</th>
                                <th style="text-align: center">التاريخ</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach($data_success as $item)
                                <tr>
                                    <td style="text-align: center">{{$i}}</td>
                                    <td style="text-align: center">{{$item->name}}</td>
                                    <td style="text-align: center">{{ $item->quantity }}</td>
                                    <td style="text-align: center">{{$item->price_product}} جنيه مصري</td>
                                    <td style="text-align: center">{{$item->total_price}} جنيه مصري</td>
                                    <td style="text-align: center">{{$item->created_at}} </td>
                                </tr>
                                @php
                                    $i++;
                                @endphp
                            @endforeach
                            </tbody>
                        </table>

                    @else
                        <tr>
                            <td>
                                <h2  style="text-align: center">لا توجد بيانات متاحة</h2>
                            </td>
                        </tr>
                    @endif

                </div>
            </div>

        </div>
    </div>


    <div class="col-12 p-3">
        <div class="col-12 col-lg-12 p-0 main-box">

            <div class="col-12 px-0">
                <div class="col-12 p-0 row">
                    <div class="col-12 col-lg-4 py-3 px-3">
                        <span class="fas fa-categories"></span> المنتجات المنتظره
                    </div>

                    <div class="col-12 col-lg-4 p-2">
                    </div>
                </div>
                <div class="col-12 divider" style="min-height: 2px;"></div>
            </div>

            <div class="col-12 p-3" style="overflow:auto">
                <div class="col-12 p-0" >

                        @if(count($data_pending)>0)
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>

                                    <th style="text-align: center">#</th>
                                    <th style="text-align: center">اسم المنتج</th>
                                    <th style="text-align: center">الكمية المباعة</th>
                                    <th style="text-align: center">سعر المنتج</th>
                                    <th style="text-align: center">سعر الكمية</th>
                                    <th style="text-align: center">التاريخ</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach($data_pending as $item)
                                    <tr>
                                        <td style="text-align: center">{{$i}}</td>
                                        <td style="text-align: center">{{$item->name}}</td>
                                        <td style="text-align: center">{{ $item->quantity }}</td>
                                        <td style="text-align: center">{{$item->price_product}} جنيه مصري</td>
                                        <td style="text-align: center">{{$item->total_price}} جنيه مصري</td>
                                        <td style="text-align: center">{{$item->created_at}} </td>
                                    </tr>
                                    @php
                                        $i++;
                                    @endphp
                                @endforeach
                                </tbody>
                            </table>

                        @else
                            <tr>
                                <td>
                                    <h2  style="text-align: center">لا توجد بيانات متاحة</h2>
                                </td>
                            </tr>
                        @endif
                </div>
            </div>

        </div>
    </div>
@stop

