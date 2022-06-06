@extends('site.layouts.index')
@section('content')
    <!-- Start Page Title Area -->
    <section class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h1>{{ $category->category_name }}</h1>
                <ul>
                    <li><a href="{{ route('site.home') }}">الرئيسية</a></li>
                    <li>{{ $category->category_name }}</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- End Page Title Area -->

    <!-- Start Products Area -->
    <br>
    <br>
    <br>
    <section class="products-area pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="drodo-grid-sorting row align-items-center">
                        <div class="col-lg-6 col-md-6 result-count">
                            <p> وجدنا <span class="count">{{ $category->products->count() }}</span> منتج مرتبط بهذا القسم </p>

                            <span class="sub-title d-lg-none"><a href="#" data-bs-toggle="modal" data-bs-target="#productsFilterModal"><i class='bx bx-filter-alt'></i> Filter</a></span>
                        </div>
                    </div>

                    <div class="row">
                        @foreach($category->products as $product)
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="single-products-box">
                                    <div class="image">
                                        <a href="#" class="d-block">
                                            <img src="{{ $product->image }}" alt="image" style="width: 100%;height: 220px;border-radius: 12px;">
                                        </a>

                                        <div class="buttons-list">
                                            <ul>
                                                <li>
                                                    <div class="cart-btn">
                                                        <a href="#">
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
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#productsQuickView"
                                                           class="product-view" data-id="{{ $product->id }}">
                                                            <i class='bx bx-search-alt'></i>
                                                            <span class="tooltip-label">مشاهدة سريعة</span>
                                                        </a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="content">
                                        <h3><a href="#">{{ $product->name }}</a></h3>
                                        <div class="price">
                                            <span class="new-price">${{ $product->price }}</span>
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
    <!-- End Products Area -->
    @include('site.pages.product.modal')
@endsection

@section('script')
    @include('site.pages.product.getProduct')
@stop
