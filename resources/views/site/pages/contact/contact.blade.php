@extends('site.layouts.index')
@section('content')
    <!-- Start Page Title Area -->
    <section class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h1>اتصل بنا</h1>
                <ul>
                    <li><a href="{{ route('site.home') }}">الرئيسية</a></li>
                    <li>اتصل بنا</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- End Page Title Area -->

    <!-- Start Products Area -->
    <br>
    <br>
    <!-- Start Contact Area -->
    <section class="contact-info-area pt-70 pb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-6 col-md-6">
                    <div class="single-contact-info-box" style="height: 216px;">
                        <div class="icon">
                            <i class="flaticon-placeholder"></i>
                        </div>
                        <h3>العنوان</h3>
                        <p><a href="#" target="_blank">6890 Blvd, The Bronx, NY 1058, USA</a></p>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 col-md-6">
                    <div class="single-contact-info-box" style="height: 216px;">
                        <div class="icon">
                            <i class="flaticon-phone-ringing"></i>
                        </div>
                        <h3>الهاتف</h3>
                        <p><a href="tel:16798">الخط الساخن: 16798</a></p>
                        <p><a href="tel:+1234567898">التواصل: (+123) 456-7898</a></p>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 col-md-6">
                    <div class="single-contact-info-box" style="height: 216px;">
                        <div class="icon">
                            <i class="flaticon-email"></i>
                        </div>
                        <h3>البريد</h3>
                        <p>
                            test@test.com
                        </p>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 col-md-6">
                    <div class="single-contact-info-box" style="height: 216px;">
                        <div class="icon">
                            <i class="flaticon-clock"></i>
                        </div>
                        <h3>ساعات العمل</h3>
                        <p>كل الايام</p>
                        <p>12:00AM -12:00 PM</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="contact-area pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="contact-form">
                        <span class="sub-title">ابقى على تواصل</span>
                        <h2>نريد أن نقدم لك تجربة رائعة</h2>
                        <form id="" method="post" action="{{ route('site.contact.send') }}">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label>الاسم بالكامل</label>
                                        <input type="text" name="name" class="form-control" id="name"  required data-error="من فضلك ادخل الاسم بالكامل">
                                        @error('name')
                                        <div class="help-block with-errors">{{ $message }}</div>
                                        @enderror

                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label>البريد</label>
                                        <input type="email" name="email" class="form-control" id="email" style="text-align: right;direction: rtl"
                                               required data-error="من فضلك ادخل البريد الالكتروني">
                                        @error('email')
                                        <div class="help-block with-errors">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label>رقم الهاتف</label>
                                        <input type="text" name="mobile" class="form-control" id="phone_number" required data-error="من فضلك ادخل رقم الهاتف">
                                        @error('mobile')
                                        <div class="help-block with-errors">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label>رسالتك</label>
                                        <textarea name="message" id="message" class="form-control" cols="30" rows="6" required data-error="من فضلك ادخل رسالتك"></textarea>
                                        @error('message')
                                        <div class="help-block with-errors">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <button type="submit" class="default-btn">ارسال</button>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12">
                    <div class="contact-image text-center">
                        <img src="{{ asset('site/assets/img/contact.png') }}" alt="image">
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
