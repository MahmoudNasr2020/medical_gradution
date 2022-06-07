@extends('site.layouts.index')
@section('content')


    <!-- Start Main Banner Area -->
    <section class="main-banner-with-categories">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-12">
                    <div class="megamenu-container">
                        <div class="megamenu-title">
                            الاقسام
                        </div>

                        <div class="megamenu-category">
                            <ul class="nav">
                                @foreach($categories as $k=>$category)
                                    @if($k < 10)
                                        <li class="nav-item">
                                            <a href="{{ route('site.category.index',['id'=>$category->id,'name'=>str_replace(' ','_',$category->category_name)]) }}" class="nav-link">{{ $category->category_name }}</a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-9 col-md-12">
                    <div class="home-slides-three owl-carousel owl-theme">
                        @foreach($banner_products as $k=>$banner_product)
                            <div class="banner-area bg-{{$k+1}}" >
                                <div class="banner-content">
                                    <span class="sub-title">{{ $banner_product->category->category_name }}</span>
                                    <h1>{{ substr($banner_product->name,0,strpos($banner_product->name,' ')) }} <br>
                                        {{ substr($banner_product->name,strpos($banner_product->name,' ')) }}
                                    </h1>
                                    <p>قم بالتسوق في موقعنا وشراء ما تريده من المنتجات الان </p>
                                    <div class="btn-box">
                                        <div class="d-flex align-items-center">
                                            <a href="{{  route('site.category.index',['id'=>$banner_product->category->id,'name'=>str_replace(' ','_',$banner_product->category->category_name)]) }}" class="default-btn"><i class="flaticon-trolley"></i> تسوق الان</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Main Banner Area -->
    <br>
    <br>
    <br>
    <!-- Start Products Area -->
    <section class="products-area pb-40">
        <div class="container">
            <div class="section-title">
                <h2>المضاف حديثاً</h2>
            </div>

            <div class="products-slides owl-carousel owl-theme">
                @foreach($products as $product)
                    <div class="single-products-box">
                        <div class="image">
                            <a href="{{ route('site.product.index',['id'=>$product->id,'name'=>str_replace(' ','_',$product->name)]) }}" class="d-block">
                                <img src="{{ $product->image  }}" alt="image" style="height: 153px;border-radius: 12px;">
                            </a>

                            <div class="buttons-list">
                                <ul>
                                    <li>
                                        <div class="cart-btn">
                                            <a href="#" class="add_to_cart" data-product_id="{{ $product->id }}">
                                                <i class='bx bxs-cart-add'></i>
                                                <span class="tooltip-label">اضف الي العربة</span>
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="wishlist-btn">
                                            <a href="#">
                                                <i class='bx bx-heart'></i>
                                                <span class="tooltip-label">اضف الي المفضلة</span>
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="quick-view-btn">
                                            <a href="#" data-bs-toggle="modal" class="product-view"
                                               data-bs-target="#productsQuickView" data-id="{{ $product->id }}">
                                                <i class='bx bx-search-alt'></i>
                                                <span class="tooltip-label">مشاهدة سريعة</span>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="content">
                            <h3><a href="{{ route('site.product.index',['id'=>$product->id,'name'=>str_replace(' ','_',$product->name)]) }}">{{ $product->name }}</a></h3>
                            <div class="price">
                                <span class="new-price"> {{ $product->price }} {{ $currency }} </span>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

    <!-- Start Categories Area -->
    <section class="categories-area pb-40">
        <div class="container">
            <div class="section-title">
                <h2>جميع الاقسام</h2>
            </div>

            <div class="row">
                @foreach($categories as $category)
                    <div class="col-lg-2 col-sm-4 col-md-4">
                        <div class="single-categories-box">
                            <img src="{{ asset('images/category.png') }}" alt="image">
                            <h3>{{ $category->category_name  }}</h3>
                            <a href="{{ route('site.category.index',['id'=>$category->id,'name'=>str_replace(' ','_',$category->category_name)]) }}" class="link-btn"></a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Categories Area -->
    @include('site.pages.product.modal')
@endsection

@section('script')
    @include('site.pages.product.getProduct')
    @include('site.pages.cart.ajax.add')
@stop
