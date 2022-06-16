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

                    @if(count($company_products) > 0)
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>

                                <th style="text-align: center">#</th>
                                <th style="text-align: center">اسم المنتج</th>
                                <th style="text-align: center">الكمية المباعة</th>
                                <th style="text-align: center">سعر المنتج</th>
                                <th style="text-align: center">سعر الكمية</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach($company_products as $item)
                                <tr>
                                    <td style="text-align: center">{{$i}}</td>
                                    <td style="text-align: center">
                                        <a href="{{ route('company.product.show',$item->id) }}">
                                            {{$item->name}}
                                        </a>
                                    </td>
                                    <td style="text-align: center">{{ $item->quantity }}</td>
                                    <td style="text-align: center">{{$item->price}} جنيه مصري</td>
                                    <td style="text-align: center">{{$item->price * $item->quantity}} جنيه مصري</td>
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

