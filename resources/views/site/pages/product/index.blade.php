@extends('site.layouts.index')
@section('content')
    <!-- Start Page Title Area -->
    <section class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h1>المنتجات</h1>
                <ul>
                    <li><a href="{{ route('site.home') }}">الرئيسية</a></li>
                    <li>{{ $product->name }}</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- End Page Title Area -->

    <!-- Start Product Details Area -->
    <section class="product-details-area pt-70 pb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-12">
                    <div class="products-details-image">
                        <ul class="products-details-image-slides owl-theme owl-carousel" data-slider-id="1">
                            <li><img src="{{ $product->image }}" alt="image"></li>
                        </ul>

                        <!-- Carousel Thumbs -->
                        <div class="owl-thumbs products-details-image-slides-owl-thumbs" data-slider-id="1">
                            <div class="owl-thumb-item">
                                <img src="{{ $product->image }}" alt="image">
                            </div>

                            <div class="owl-thumb-item">
                                <img src="{{ $product->image }}" alt="image">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7 col-md-12">
                    <div class="products-details-desc">
                        <h3>{{ $product->name }}</h3>

                        <div class="price">
                            <span class="new-price">{{ $product->price }}{{ $currency }}</span>
                        </div>


                        <ul class="products-info">
                            <li><span>القسم : </span> <a href="#">{{ $product->category->category_name }}</a></li>
                            <li><span>البلد المنتجة : </span> <a href="#">{{ $product->production_country }}</a></li>

                            <li><span>الكمية المباعة : </span> <a href="#">
                            {{ $product_seller = \App\Models\BestSeller::where('product_id',$product->id)->select('quantity')->first()->quantity }}
                            </a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12">
                    <div class="products-details-tabs">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item"><a class="nav-link active" id="description-tab" data-bs-toggle="tab" href="#description"
                                                    role="tab" aria-controls="description">وصف المنتج</a></li>
                        </ul>

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="description" role="tabpanel">
                                {{ $product->description }}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if($product->category->products->count() > 1)
        <div class="related-products">
            <div class="container">
                <div class="section-title">
                    <h2>المنتجات ذات العلاقة</h2>
                </div>

                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="drodo-grid-sorting row align-items-center">
                            <div class="col-lg-6 col-md-6 result-count">
                                <p> وجدنا <span class="count">{{ $product->category->products->count() - 1 }}</span> منتج مرتبط بهذا المنتج </p>

                                <span class="sub-title d-lg-none"><a href="#" data-bs-toggle="modal" data-bs-target="#productsFilterModal"><i class='bx bx-filter-alt'></i> Filter</a></span>
                            </div>
                        </div>

                        <div class="row">
                            @foreach($product->category->products as $related_product)
                                @if($related_product->id != $product->id )
                                    <div class="col-lg-3 col-md-4 col-sm-6">
                                        <div class="single-products-box">
                                            <div class="image">
                                                <a href="{{ route('site.product.index',['id'=>$related_product->id,'name'=>str_replace(' ','_',$related_product->name)]) }}" class="d-block">
                                                    <img src="{{ $related_product->image }}" alt="image" style="width: 100%;height: 220px;border-radius: 12px;">
                                                </a>

                                                <div class="buttons-list">
                                                    <ul>
                                                        <li>
                                                            <div class="cart-btn">
                                                                <a href="#" class="add_to_cart" data-product_id="{{ $related_product->id }}">
                                                                    <i class='bx bxs-cart-add'></i>
                                                                    <span class="tooltip-label">اضف الي العربة</span>
                                                                </a>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="wishlist-btn">
                                                                @php
                                                                        $class = '';
                                                                        $color = '';
                                                                        $background = '';
                                                                        $text =  'اضف الي المفضلة' ;
                                                                        if(\Illuminate\Support\Facades\Auth::check())
                                                                        {
                                                                            $item = \App\Models\Favourite::where(['user_id' => \Illuminate\Support\Facades\Auth::user()->id,'product_id'=>$related_product->id])->first() ? true : false ;
                                                                            if($item)
                                                                            {
                                                                                $class = 'active';
                                                                                $color = '#ffffff';
                                                                                $background = '#470938';
                                                                                $text = 'ازالة من المفضلة' ;
                                                                            }
                                                                        }

                                                                @endphp
                                                                <a href="#" class="favourite {{ $class }}" data-product_id="{{ $related_product->id }}"
                                                                   style="background-color: {{ $background }};color: {{ $color }}">
                                                                    <i class='bx bx-heart'></i>
                                                                    <span class="tooltip-label favourite_text">{{ $text }}</span>
                                                                </a>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="quick-view-btn">
                                                                <a href="#" data-bs-toggle="modal" data-bs-target="#productsQuickView"
                                                                   class="product-view" data-id="{{ $related_product->id }}">
                                                                    <i class='bx bx-search-alt'></i>
                                                                    <span class="tooltip-label">مشاهدة سريعة</span>
                                                                </a>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="content">
                                                <h3><a href="{{ route('site.product.index',['id'=>$related_product->id,'name'=>str_replace(' ','_',$related_product->name)]) }}">{{ $related_product->name }}</a></h3>
                                                <div class="price">
                                                    <span class="new-price">{{ $related_product->price }} {{ $currency }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach

                        </div>
                    </div>

                </div>
            </div>
        </div>
        @endif
    </section>
    <!-- End Product Details Area -->
    @include('site.pages.product.modal')
@endsection
@section('script')
    @include('site.pages.favourite.favourite')
    @include('site.pages.product.getProduct')
    @include('site.pages.cart.ajax.add')
@stop
