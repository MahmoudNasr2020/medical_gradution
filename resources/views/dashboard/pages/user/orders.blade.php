@extends('dashboard.layouts.index')

@section('content')
    <div class="col-12 p-3">
        <div class="col-12 col-lg-12 p-0 main-box">

            <div class="col-12 px-0">
                <div class="col-12 p-0 row">
                    <div class="col-12 col-lg-4 py-3 px-3">
                        <span class="fas fa-categories"></span> المستخدم - <span style="font-weight: bold"> {{ $user->name }}</span>
                    </div>
                    <div class="col-12 col-lg-4 p-2">
                    </div>
                </div>
                <div class="col-12 divider" style="min-height: 2px;"></div>
            </div>

            <div class="col-12 p-3" style="overflow:auto">
                <div class="col-12 p-0" >

                    @if($user->orders->count() > 0)
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">رقم الطلب</th>
                                <th scope="col">المنتج</th>
                                <th scope="col">سعر المنتج</th>
                                <th scope="col">الكمية</th>
                                <th scope="col">سعر الكمية</th>
                                <th scope="col">السعر الاجمالي</th>
                                <th scope="col">حالة التسليم</th>
                                <th scope="col">التاريخ</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($user->orders as $k=>$order)
                                <tr style="border-bottom-width:10px">
                                <td>
                                    {{$k+1}}
                                </td>
                                    <td class="product-id">
                                        <a href="">
                                            {{ $order->order_id }}
                                        </a>
                                    </td>

                                    <td class="product-name">
                                        @foreach(json_decode($order->order_list) as $item)
                                            {{ \App\Models\Product::where('id',$item->product_id)->first() ? \App\Models\Product::where('id',$item->product_id)->first()->name  : 'غير موجود' }}
                                            @if(!$loop->last)
                                                <br><hr>
                                            @endif
                                        @endforeach
                                    </td>

                                    <td class="product-total">
                                        @foreach(json_decode($order->order_list) as $item)
                                            {{ \App\Models\Product::where('id',$item->product_id)->first() ? \App\Models\Product::where('id',$item->product_id)->first()->price .'£E'  : 'غير موجود' }}
                                            @if(!$loop->last)
                                                <br><hr>
                                            @endif
                                        @endforeach
                                    </td>

                                    <td class="product-total">
                                        @foreach(json_decode($order->order_list) as $item)
                                            {{ $item->quantity }}
                                            @if(!$loop->last)
                                                <br><hr>
                                            @endif
                                        @endforeach
                                    </td>

                                    <td class="product-total">
                                        @foreach(json_decode($order->order_list) as $item)
                                            {{ $item->total_price }}£E
                                            @if(!$loop->last)
                                                <br><hr>
                                            @endif
                                        @endforeach
                                    </td>

                                    <td class="product-total">
                                        {{ $order->total_price }} جنيه مصري
                                    </td>

                                    @php
                                          $waiting = $order->status == 'pending' ?'checked' :'';
                                          $success = $order->status == 'success' ?'checked' :'';
                                          $failed = $order->status == 'failed' ?'checked' :'';

                                    @endphp
                                    <td class="product-total" style="text-align: center">
                                        <ul class="list-unstyled mb-0" style="white-space: nowrap;margin-top: -0.75em;">
                                            <br>
                                            <li class="d-block mr-2 mb-1">
                                                <fieldset>
                                                    <div class="radio radio-primary">
                                                        <input type="radio" name="attendance_date{{ $order->id }}" {{ $waiting }} class="radio_attendance" id="colorRadio4{{ $order->id }}" data-status="pending"
                                                               data-order_id="{{ $order->id }}">
                                                        <label for="colorRadio4{{ $order->user_id }}" style="font-size:13px">في الانتظار</label>
                                                    </div>
                                                </fieldset>
                                            </li>
                                            <br>
                                            <li class="d-block mr-2 mb-1">
                                                <fieldset>
                                                    <div class="radio radio-warning">
                                                        <input type="radio" name="attendance_date{{ $order->id }}" {{ $success }} class="radio_attendance" id="colorRadio5{{ $order->id }}" data-status="success"
                                                               data-order_id="{{ $order->id }}">
                                                        <label for="colorRadio5{{ $order->id }}" style="font-size:13px">تم التسليم</label>
                                                    </div>
                                                </fieldset>
                                            </li>
                                            <br>
                                            <li class="d-block mr-2 mb-1">
                                                <fieldset>
                                                    <div class="radio radio-danger">
                                                        <input type="radio" name="attendance_date{{ $order->id }}" {{ $failed }}  style="margin-right: -25px;"
                                                        class="radio_attendance" id="colorRadio6{{ $order->id }}" data-status="failed"
                                                               data-order_id="{{ $order->id }}">
                                                        <label for="colorRadio6{{ $order->id }}" style="font-size:13px">فشل</label>
                                                    </div>
                                                </fieldset>
                                            </li>
                                    </td>
                                    <td class="product-total">
                                        {{ $order->created_at }}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else

                        <div class="font-3" style="text-align: center">
                            لا توجد بيانات متاحة
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
@stop

@section('scripts')
    <script>
        $(document).on('change','.radio_attendance',function () {
            if($(this).is(':checked'))
            {
                let order_id = $(this).data('order_id');
                let order_status = $(this).data('status');
                console.log(order_id+'......'+order_status);
                let route="{{ route('dashboard.user.status') }}";
                $.ajax({
                    method:"POST",
                    url:route,
                    data:{
                        '_token':"{{ csrf_token() }}",
                        'order_id':order_id,
                        'order_status':order_status
                    }
                });
            }

        });
    </script>
@endsection
