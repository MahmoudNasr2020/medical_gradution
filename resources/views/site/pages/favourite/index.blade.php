@extends('site.layouts.index')
@section('content')
    <!-- Start Page Title Area -->
    <section class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h1>المفضلة</h1>
                <ul>
                    <li><a href="{{ route('site.home') }}">الرئيسية</a></li>
                    <li>المفضلة</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- End Page Title Area -->

    <!-- Start Products Area -->
    <br>
    <br>
    @if($favourites->count() > 0)
        <section class="products-area pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="row">
                            @foreach($favourites as $favourite)
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="single-products-box">
                                        <div class="image">
                                            <a href="{{ route('site.product.index',['id'=>$favourite->product->id,'name'=>str_replace(' ','_',$favourite->product->name)]) }}" class="d-block">
                                                <img src="{{ $favourite->product->image }}" alt="image" style="width: 100%;height: 220px;border-radius: 12px;">
                                            </a>

                                            <div class="buttons-list">
                                                <ul>
                                                    <li>
                                                        <div class="cart-btn">
                                                            <a href="#" class="add_to_cart" data-product_id="{{ $favourite->product->id }}">
                                                                <i class='bx bxs-cart-add'></i>
                                                                <span class="tooltip-label">اضف الي العربة</span>
                                                            </a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="wishlist-btn">
                                                            @php
                                                                $class = 'active';
                                                                $color = '#ffffff';
                                                                $background = '#470938';
                                                                $text = 'ازالة من المفضلة' ;
                                                            @endphp
                                                            <a href="#" class="favourite_item {{ $class }}" onclick="event.preventDefault();document.getElementById('delete_fav_form{{ $favourite->product->id }}').submit()"
                                                               data-product_id="{{ $favourite->product->id }}"
                                                               style="background-color: {{ $background }};color: {{ $color }}">
                                                                <i class='bx bx-heart'></i>
                                                                <span class="tooltip-label favourite_text">{{ $text }}</span>
                                                            </a>
                                                            <form action="{{ route('site.favourite.delete') }}" method="post" class="d-none" id="delete_fav_form{{ $favourite->product->id }}">
                                                                @csrf
                                                                <input hidden name="product_id" value="{{ $favourite->product->id }}">
                                                            </form>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="quick-view-btn">
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#productsQuickView"
                                                               class="product-view" data-id="{{ $favourite->product->id }}">
                                                                <i class='bx bx-search-alt'></i>
                                                                <span class="tooltip-label">مشاهدة سريعة</span>
                                                            </a>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="content">
                                            <h3><a href="{{ route('site.product.index',['id'=>$favourite->product->id,'name'=>str_replace(' ','_',$favourite->product->name)]) }}">{{ $favourite->product->name }}</a></h3>
                                            <div class="price">
                                                <span class="new-price">{{ $favourite->product->price }} {{ $currency }}</span>
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
    @else
        <div>
            <h2 style="text-align: center">
                لا توجد بيانات
            </h2>
        </div>
    @endif

    <!-- End Products Area -->
    @include('site.pages.product.modal')
@endsection

@section('script')
    @include('site.pages.product.getProduct')
    @include('site.pages.cart.ajax.add')
@stop
