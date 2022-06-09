@extends('site.layouts.index')

@section('content')
    <!-- Start Page Title Area -->
    <section class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h1>عربة التسوق</h1>
                <ul>
                    <li><a href="{{ route('site.home') }}">الرئيسية</a></li>
                    <li>عربة التسوق</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- End Page Title Area -->
    <!-- Start Cart Area -->
    <section class="cart-area ptb-70">
        <div class="container">
            <form>
                <div class="cart-table table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">المنتج</th>
                            <th scope="col">الاسم</th>
                            <th scope="col">السعر</th>
                            <th scope="col">الكمية</th>
                            <th scope="col">السعر الاجمالي</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($all_carts as $cart)
                            <tr class="cart-entity"  data-cart_id = "{{ $cart->id }}">
                                <td class="product-thumbnail">
                                    <a href="{{ route('site.product.index',['id'=>$cart->product->id,'name'=>str_replace(' ','_',$cart->product->name)]) }}">
                                        <img src="{{ $cart->product->image }}" alt="item" style="height: 70px !important;">
                                    </a>
                                </td>

                                <td class="product-name">
                                    <a href="{{ route('site.product.index',['id'=>$cart->product->id,'name'=>str_replace(' ','_',$cart->product->name)]) }}">{{ $cart->product->name }}</a>
                                </td>

                                <td class="product-price">
                                    <span class="unit-amount">{{ $cart->product->price }}{{ $currency }}</span>
                                </td>

                                <td class="product-quantity">
                                    <div class="input-counter">
                                        <span class="minus-btn"><i class='bx bx-minus'></i></span>
                                        <label>
                                            <input type="text" min="1" value="{{ $cart->quantity }}" class="quantity_input" readonly>
                                        </label>
                                        <span class="plus-btn"><i class='bx bx-plus'></i></span>
                                    </div>
                                </td>

                                <td class="product-subtotal">
                                    <span class="subtotal-amount">{{ $cart->price }}{{ $currency }}</span>

                                    <a href="#" class="remove" data-cart_id="{{ $cart->id }}">
                                        <i class='bx bx-trash'></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="cart-buttons">
                    <div class="row align-items-center">
                        <div class="col-lg-12 col-sm-12 col-md-12 text-end">
                            <a href="" class="default-btn" id="update_cart_btn"><i class="flaticon-view"></i> تحديث العربة</a>
                        </div>
                    </div>
                </div>

                <div class="cart-totals">
                    <h3>تفاصيل العربة</h3>

                    <ul>
                        <li>
                            السعر الفرعي
                            <span id="sub_price">
                                    {{ \App\Models\Cart::where('user_id',\Illuminate\Support\Facades\Auth::user()->id)->sum('price') }} جنيه مصري
                            </span>
                        </li>

                        <li>السعر الاجمالي
                            <span id="total_price">
                                {{ \App\Models\Cart::where('user_id',\Illuminate\Support\Facades\Auth::user()->id)->sum('price') }} جنيه مصري
                            </span>
                        </li>
                    </ul>
                        @if(\App\Models\Cart::where('user_id',\Illuminate\Support\Facades\Auth::user()->id)->get()->count() > 0)
                            <a href="{{ route('site.checkout.index',['id'=>\Illuminate\Support\Facades\Auth::check() ? \Illuminate\Support\Facades\Auth::user()->id : 0,
                                          'name'=>\Illuminate\Support\Facades\Auth::check() ? str_replace(' ','_',\Illuminate\Support\Facades\Auth::user()->name) : 'name']) }}"
                               class="default-btn" id="checkout-btn">
                                <i class="flaticon-trolley"></i>الانتقال الي عملية الدفع
                            </a>
                        @endif
                </div>
            </form>
        </div>
    </section>
    <!-- End Cart Area -->
    @include('site.pages.product.modal')
@endsection

@section('script')
    <script>

        $(document).on('click','.plus-btn',function (e) {
            e.preventDefault();
            let price = $(this).parents('td').siblings('td').children('.unit-amount').text();
            let total_price = $(this).parents('td').siblings('td').children('.subtotal-amount').text();
            let new_price = parseFloat(price.toString().substr(0,price.indexOf("£E")));
            let new_total_price = parseFloat(total_price.toString().substr(0,total_price.indexOf("£E")));
            $(this).parents('td').siblings('td').children('.subtotal-amount').text((new_total_price+new_price) + '£E');
        })

        $(document).on('click','.minus-btn',function (e) {
            e.preventDefault();
                let price = $(this).parents('td').siblings('td').children('.unit-amount').text();
                let total_price = $(this).parents('td').siblings('td').children('.subtotal-amount').text();
                let new_price = parseFloat(price.toString().substr(0,price.indexOf("£E")));
                let new_total_price = parseFloat(total_price.toString().substr(0,total_price.indexOf("£E")));
                if((new_total_price-new_price) > 0)
                {
                    $(this).parents('td').siblings('td').children('.subtotal-amount').text((new_total_price-new_price) + "£E" );
                }


        })
    </script>

    @include('site.pages.cart.ajax.update')
    @include('site.pages.cart.ajax.delete')

@stop
