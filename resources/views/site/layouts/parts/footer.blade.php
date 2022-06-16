<!-- Start Footer Area -->
<footer class="footer-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-6 col-md-6">
                <div class="single-footer-widget">
                    <a href="#" class="logo d-inline-block"><img src="{{ asset('images/logo.png') }}" style="height: 164px;margin-top: -76px;" alt="image"></a>
                    <ul class="footer-contact-info" style="margin-top: -52px;">
                        <li><span>الخط الساخن:</span> <a href="#">16768</a></li>
                        <li><span>الهاتف:</span> <a href="tel:+1234567898">(+123) 456-7898</a></li>
                        <li><span>الايميل:</span>
                            <a href="#">
                                <span class="__cf_email__" >test@test.com</span></a></li>
                        <li><span>العنوان:</span> <a href="#" target="_blank">المعهد العالي للهندسة , مدينة الثقافة والعلوم , 6 اكتوبر</a></li>
                    </ul>
                    <ul class="social">
                        <li><a href="#" target="_blank"><i class='bx bxl-facebook-square'></i></a></li>
                        <li><a href="#" target="_blank"><i class="bx bxl-twitter"></i></a></li>
                        <li><a href="#" target="_blank"><i class='bx bxl-instagram-alt'></i></a></li>
                        <li><a href="#" target="_blank"><i class='bx bxl-linkedin-square'></i></a></li>
                        <li><a href="#" target="_blank"><i class='bx bxl-pinterest'></i></a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-4 col-sm-6 col-md-6">
                <div class="single-footer-widget">
                    <h3>معلومات</h3>

                    <ul class="link-list">
                        <li><a href="{{ route('site.home') }}">الرئيسية</a></li>
                        <li><a href="#">عنا</a></li>
                        <li><a href="#">اتصل بنا</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-4 col-sm-6 col-md-6">
                <div class="single-footer-widget">
                    <h3>العملاء</h3>

                    <ul class="link-list">
                        <li><a href="#">حسابي</a></li>
                        <li><a href="{{ route('site.order.index',['id'=>\Illuminate\Support\Facades\Auth::check() ? \Illuminate\Support\Facades\Auth::user()->id : 0,'name'=>str_replace(' ','_',\Illuminate\Support\Facades\Auth::check() ? \Illuminate\Support\Facades\Auth::user()->name : 'NAN')]) }}">طلباتي</a></li>
                        <li><a href="{{ route('site.cart.index',['id'=>\Illuminate\Support\Facades\Auth::check() ? \Illuminate\Support\Facades\Auth::user()->id : 0,
                                                    'name'=>\Illuminate\Support\Facades\Auth::check() ? str_replace(' ','_',\Illuminate\Support\Facades\Auth::user()->name) : 'name']) }}">عربة التسوق</a></li>
                        <li><a href="{{ route('site.favourite.index',['id'=>\Illuminate\Support\Facades\Auth::check() ? \Illuminate\Support\Facades\Auth::user()->id : 0,
                                                    'name'=>\Illuminate\Support\Facades\Auth::check() ? str_replace(' ','_',\Illuminate\Support\Facades\Auth::user()->name) : 'name'])  }}">المفضلة</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>

    <div class="footer-bottom-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <p>تم التطوير بواسطة <a href="#" target="_blank">قسم حاسب - المعهد العالي  للهندسة - مدينة الثقافة والعلوم</a></p>
                </div>

                <div class="col-lg-6 col-md-6">
                    <div class="payment-types">
                        <ul class="d-flex align-items-center justify-content-end">
                            <li>نحن نقبل الدفع من خلال</li>
                            <li><a href="#" ><img src="{{ asset('site/assets/img/payment-types/visa.png') }}" alt="image"></a></li>
                            <li><a href="#" ><img src="{{ asset('site/assets/img/payment-types/mastercard.png') }}" alt="image"></a></li>
                            <li><a href="#" ><img src="{{ asset('site/assets/img/payment-types/meeza.png') }}" style="width: 67px" alt="image"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- End Footer Area -->
