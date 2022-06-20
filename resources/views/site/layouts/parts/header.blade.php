<!-- Start Top Header Area -->
<div class="top-header">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-7">
                <ul class="top-header-contact-info">
                    <li> <a href="#">طبيات, اختيارك الذكي</a></li>
                </ul>
            </div>

            <div class="col-lg-6 col-md-5">
                <ul class="top-header-menu">
                    @if(\Illuminate\Support\Facades\Auth::check())
                        <li>
                            <div class="dropdown currency-switcher d-inline-block">

                                <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span>{{ \Illuminate\Support\Facades\Auth::user()->name }} <i class="bx bx-chevron-down"></i></span>
                                </button>

                                <div class="dropdown-menu">
                                    <a href="{{ route('site.order.index',['id'=>\Illuminate\Support\Facades\Auth::user()->id,'name'=>str_replace(' ','_',\Illuminate\Support\Facades\Auth::user()->name)]) }}" class="dropdown-item">طلباتي</a>
                                    <a href="{{ route('site.profile.index') }}" class="dropdown-item">الملف الشخصي</a>
                                    <a href="#" class="dropdown-item" onclick="var form = document.getElementById('form_logout').submit()">تسجيل الخروج</a>
                                    <form class="d-none" method="POST" action="{{ route('site.logout') }}" id="form_logout">
                                        @csrf
                                    </form>
                                </div>

                            </div>
                        </li>
                    @else
                        <li>
                            <div class="dropdown currency-switcher d-inline-block">
                                <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span>حسابي <i class="bx bx-chevron-down"></i></span>
                                </button>

                                <div class="dropdown-menu">
                                    <a href="{{ route('site.loginUser') }}" class="dropdown-item">تسجيل الدخول</a>
                                    <a href="{{ route('site.registerUser') }}" class="dropdown-item">مستخدم جديد</a>
                                </div>
                            </div>
                        </li>
                    @endif


                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End Top Header Area -->

<!-- Start Navbar Area -->
<div class="navbar-area">
    <div class="drodo-responsive-nav">
        <div class="container">
            <div class="drodo-responsive-menu">
                <div class="logo">
                    <a href="{{ route('site.home') }}">
                        <img src="{{ asset('images/logo.png') }}" style="height: 80px !important;" alt="logo">
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="drodo-nav">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" href="{{ route('site.home') }}">
                    <img src="{{ asset('images/logo.png') }}" style="height: 80px !important;" alt="logo">
                </a>

                <div class="collapse navbar-collapse mean-menu">
                    <ul class="navbar-nav">

                        <li class="nav-item">
                            <a href="{{ route('site.home') }}" class="nav-link {{ request()->segment(1) == '' ? 'active' :'' }}">الرئيسية</a>
                        </li>

                        <li class="nav-item megamenu"><a href="#" class="nav-link">الاقسام <i class='bx bx-chevron-down'></i></a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col">
                                                <h6 class="submenu-title">عرض الاقسام</h6>

                                                <ul class="megamenu-submenu">
                                                    @foreach($categories_nav as $category)
                                                        <li>
                                                            <a href="{{  route('site.category.index',['id'=>$category->id,'name'=>str_replace(' ','_',$category->category_name)]) }}">
                                                                {{ $category->category_name }}
                                                            </a>
                                                        </li>
                                                    @endforeach

                                                </ul>
                                            </div>

                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item"><a href="{{ route('site.contact.index') }}" class="nav-link">اتصل بنا</a></li>
                    </ul>

                    <div class="others-option">
                        <div class="option-item">
                            <div class="cart-btn">
                                <a href="{{ route('site.favourite.index',['id'=>\Illuminate\Support\Facades\Auth::check() ? \Illuminate\Support\Facades\Auth::user()->id : 0,
                                                    'name'=>\Illuminate\Support\Facades\Auth::check() ? str_replace(' ','_',\Illuminate\Support\Facades\Auth::user()->name) : 'name']) }}">
                                    @php
                                       if(Auth::check())
                                       {
                                            $count_fav = \App\Models\Favourite::where('user_id',Auth::user()->id)->get()->count();
                                       }
                                       else
                                       {
                                           $count_fav = 0;
                                       }
                                    @endphp
                                    <i class='bx bx-heart'></i>
                                    <span id="fav_count" data-count="{{ $count_fav }}">{{ $count_fav }}</span>
                                </a>
                            </div>
                        </div>

                        <div class="option-item">
                            <div class="cart-btn">
                                <a href="{{ route('site.cart.index',['id'=>\Illuminate\Support\Facades\Auth::check() ? \Illuminate\Support\Facades\Auth::user()->id : 0,
                                                    'name'=>\Illuminate\Support\Facades\Auth::check() ? str_replace(' ','_',\Illuminate\Support\Facades\Auth::user()->name) : 'name']) }}">
                                    @php
                                       use App\Models\Cart;
                                        if(Auth::check())
                                       {
                                            $count = Cart::where('user_id',Auth::user()->id)->get()->count();
                                       }
                                       else
                                       {
                                           $count = 0;
                                       }
                                    @endphp
                                    <i class='bx bx-shopping-bag'></i>
                                    <span id="cart_count" data-count="{{ $count }}">{{ $count }}</span>
                                </a>
                            </div>
                        </div>

                        <div class="option-item">
                            <div class="search-btn-box">
                                <i class="search-btn bx bx-search-alt"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
<!-- End Navbar Area -->

<!-- Start Search Overlay -->
<div class="search-overlay">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="search-overlay-layer"></div>
            <div class="search-overlay-layer"></div>
            <div class="search-overlay-layer"></div>

            <div class="search-overlay-close">
                <span class="search-overlay-close-line"></span>
                <span class="search-overlay-close-line"></span>
            </div>

            <div class="search-overlay-form">
                <form>
                    <input type="text" class="input-search" placeholder="Search here...">
                    <button type="submit"><i class='bx bx-search-alt'></i></button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Search Overlay -->
