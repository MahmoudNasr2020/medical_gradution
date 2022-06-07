@extends('site.layouts.index')
@section('content')
    <!-- Start Page Title Area -->
    <section class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h1>الدفع</h1>
                <ul>
                    <li><a href="{{ route('site.home') }}">الرئيسية</a></li>
                    <li>الدفع</li>
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
            @if($carts->count() > 0)
                <form>
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="billing-details">
                                <h3 class="title">تفاصيل الفاتورة</h3>

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


                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <textarea  id="notes" cols="30" rows="5" placeholder="ملاحظات الطلب" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12">
                            <div class="order-details">
                                <h3 class="title">طلبك</h3>

                                <div class="order-table table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th scope="col">اسم المنتج</th>
                                            <th scope="col">سعر المنتج</th>
                                            <th scope="col">الكمية</th>
                                            <th scope="col">الاجمالي</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        @foreach($carts as $cart)
                                            <tr>
                                                <td class="product-name">
                                                    <a href="{{ route('site.product.index',['id'=>$cart->product->id,'name'=>str_replace(' ','_',$cart->product->name)]) }}">{{ $cart->product->name }}</a>
                                                </td>

                                                <td class="product-total">
                                                    <span class="subtotal-amount">{{ $cart->product->price }}{{ $currency }}</span>
                                                </td>

                                                <td class="product-total">
                                                    <span class="subtotal-amount">{{ $cart->quantity }}</span>
                                                </td>

                                                <td class="product-total">
                                                    <span class="subtotal-amount">{{ $cart->price }}{{ $currency }}</span>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <br>
                                    <br>
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th scope="col">الكمية المطلوبة</th>
                                            <th scope="col">مجموع سلة التسوق</th>
                                            <th scope="col">الاجمالي المستحق</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        <tr>
                                            <td class="order-subtotal">
                                                <span>{{ $carts->sum('quantity') }}</span>
                                            </td>

                                            <td class="order-subtotal">
                                                <span>{{ $carts->sum('price') }} جنيه مصري</span>
                                            </td>

                                            <td class="order-subtotal-price">
                                                <span class="order-subtotal-amount">  {{ $carts->sum('price') }} جنيه مصري</span>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="payment-box">
                                    <div class="payment-method">
                                        <p>
                                            <input type="radio" id="direct-bank-transfer" name="radio-group" checked>
                                            <label for="direct-bank-transfer">Paymob</label>
                                            الدفع من خلال بوابة Paymob
                                        </p>
                                    </div>
                                    <a href="#" class="default-btn" id="btn-payment"
                                        onclick="event.preventDefault();document.getElementById('payment_form').submit();">
                                        <i class="flaticon-tick"></i>تاكيد الطلب<span></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <form class="d-none" id="payment_form" method="post" action="{{ route('site.checkout.pay') }}">
                    @csrf
                    <textarea class="d-none" id="notes_of_order" name="notes"></textarea>
                </form>
            @else
                <h2 style="text-align: center">لا توجد بيانات</h2>
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
