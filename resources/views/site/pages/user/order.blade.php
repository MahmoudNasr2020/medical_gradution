@extends('site.layouts.index')
@section('content')
    <!-- Start Page Title Area -->
    <section class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h1>طلباتك</h1>
                <ul>
                    <li><a href="{{ route('site.home') }}">الرئيسية</a></li>
                    <li>طلباتك</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- End Page Title Area -->
    <!-- Start Checkout Area -->
    <section class="checkout-area ptb-70">
        <div class="container">
            <div class="user-actions">
                <i class='bx bx-log-in'></i>
                <span>العودة للرئيسية؟ <a href="{{ route('site.home') }}">اضغط هنا</a></span>
            </div>
            @if($orders->count() > 0)
                <form>
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="billing-details">
                                <h3 class="title">تفاصيل المستخدم</h3>

                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label>Country <span class="required">*</span></label>

                                            <div class="select-box">
                                                <select>
                                                    <option>مصر</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>الاسم الاول <span class="required">*</span></label>
                                            <input type="text" class="form-control" readonly
                                                   value="{{ substr(\Illuminate\Support\Facades\Auth::user()->name,0,strpos(\Illuminate\Support\Facades\Auth::user()->name,' ')) }}">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>الاسم الاخير <span class="required">*</span></label>
                                            <input type="text" class="form-control" readonly
                                                   value="{{ substr(\Illuminate\Support\Facades\Auth::user()->name,strpos(\Illuminate\Support\Facades\Auth::user()->name,' ')) }}">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>الايميل <span class="required">*</span></label>
                                            <input type="email" class="form-control" readonly value="{{ \Illuminate\Support\Facades\Auth::user()->email }}" style="text-align: right" >
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>رقم الهاتف <span class="required">*</span></label>
                                            <input type="text" class="form-control" readonly value="{{ \Illuminate\Support\Facades\Auth::user()->phone_number }}">
                                        </div>
                                    </div>


                                    <div class="col-lg-12 col-md-6">
                                        <div class="form-group">
                                            <label>العنوان <span class="required">*</span></label>
                                            <input type="text" class="form-control" name="address"
                                                   readonly value="{{ \Illuminate\Support\Facades\Auth::user()->address }}">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                        <br>
                        <br>
                        <div class="col-lg-12 col-md-12 mt-5">
                            <div class="order-details">
                                <h3 class="title">الطلب الخاص بك</h3>

                                <div class="order-table table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th scope="col">رقم الطلب</th>
                                            <th scope="col">المنتج</th>
                                            <th scope="col">سعر المنتج</th>
                                            <th scope="col">الكمية</th>
                                            <th scope="col">سعر الكمية</th>
                                            <th scope="col">السعر الاجمالي</th>
                                            <th scope="col">حالة التسليم</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        @foreach($orders as $order)
                                            <tr style="border-bottom-width:3px">
                                                <td class="product-id">
                                                    {{ $order->order_id }}
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

                                                <td class="product-total" style="text-align: center">
                                                    @if($order->status == 'success')
                                                        <div class="btn btn-outline-success">تم التسليم</div>
                                                    @elseif($order->status == 'failed')
                                                        <div class="btn btn-outline-danger">فشل التسليم</div>
                                                    @else
                                                        <div class="btn btn-outline-primary">في الانتظار</div>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <br>
                                    <br>

                                </div>

                            </div>
                        </div>
                    </div>
                </form>
            @else
                <h2 style="text-align: center">لا توجد طلبات</h2>
            @endif

        </div>
    </section>
    <!-- End Checkout Area -->
@endsection

@section('script')
    <script>
        $('#notes').on('input',function () {
            $('#notes_of_order').val($('#notes').val()) ;
        })
    </script>
@stop
