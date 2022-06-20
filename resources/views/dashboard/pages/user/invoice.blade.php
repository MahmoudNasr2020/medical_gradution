@extends('dashboard.layouts.index')

@section('content')
    <section class="checkout-area ptb-70">
        <div class="container">
          <br>
          <br>
            <button type="button" class="btn btn-outline-success" onclick="printJS('printJS-card', 'html')">
                طباعة الفاتورة
            </button>
            <br>
            <br>
            <div class="col-12" id="printJS-card">
                <div class="card">
                    <div class="card-header bg-black"></div>
                    <div class="card-body">

                        <div class="container">
                            <div class="row">
                                <div class="col-xl-12">
                                    <i class="far fa-building text-danger fa-6x float-start"></i>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-xl-12">

                                    <ul class="list-unstyled float-end" style="float: right !important;">
                                        <li style="font-size: 30px;color: #470938 !important;">طبيات</li>
                                        <li>السادس من اكتوبر</li>
                                        <li>123-456-789</li>
                                        <li>mail@mail.com</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="row text-center">
                                <h3 class="text-uppercase text-center mt-3" style="font-size: 40px;">فاتورة</h3>
                                <p>{{ $order->order_id }}</p>
                            </div>
                            <br>
                            <br>
                            <div class="row mx-3">
                                <div class="col-12">
                                    اسم العميل :   <span style="font-weight: bold"> {{ $order->user->name }} </span>
                                </div>
                                <div class="col-12">
                                    رقم الهاتف :   <span style="font-weight: bold">{{ $order->user->phone_number }} </span>
                                </div>
                                <div class="col-12">
                                    العنوان :   <span style="font-weight: bold">{{ $order->user->address }} </span>
                                </div>

                            </div>
                            <hr>
                            <div class="row mx-3">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">اسم المنتج</th>
                                        <th scope="col">الكمية</th>
                                        <th scope="col">السعر الاجمالي</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach(json_decode($order->order_list) as $item)
                                        <tr>
                                            <td>{{ \App\Models\Product::where('id',$item->product_id)->first() ? \App\Models\Product::where('id',$item->product_id)->first()->name  : 'غير موجود' }}</td>
                                            <td> {{ $item->quantity }} </td>
                                            <td> {{ $item->total_price }} جنيه مصري </td>
                                        </tr>
                                    @endforeach
                                    <tr style="border-color: transparent;position: relative;top: 15px;">
                                        <td style="font-weight: bold">اجمالي المبلغ المدفوع</td>
                                        <td></td>
                                        <td style="font-weight: bold">{{ $order->total_price }} جنيه مصري</td>
                                    </tr>
                                    </tbody>
                                </table>

                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-xl-8" style="margin-left:60px">
                                    <p class="float-end"
                                       style="font-size: 30px; color: #470938; font-weight: 400;font-family: Arial, Helvetica, sans-serif;">
                                        الاجمالي :
                                        <span>
                                           {{ $order->total_price }} جنيه مصري
                                       </span></p>
                                </div>

                            </div>

                            <div class="row mt-2 mb-5">
                                <p class="fw-bold">التاريخ :  <span class="text-muted">{{ date_format($order->created_at,'Y-m-d') }}</span></p>
                                <p class="fw-bold mt-3">التوقيع : <img src="{{ asset('site/assets/img/signture.png') }}" style="width: 84px;"> </p>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer bg-black"></div>
                </div>
            </div>
        </div>
    </section>
@stop

@section('scripts')
    <script src="{{ asset('site/assets/plugins/print.min.js') }}"></script>
    <script>
        childWindow.document.write('<html><head></head><body dir="rtl">');
        printJS({
            style: 'body{direction:rtl;}'
        })

    </script>
@stop







