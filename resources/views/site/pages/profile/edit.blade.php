@extends('site.layouts.index')
@section('content')
    <!-- Start Page Title Area -->
    <section class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h1>الملف الشخصي</h1>
                <ul>
                    <li><a href="{{ route('site.home') }}">الرئيسية</a></li>
                    <li>تعديل الملف الشخصي</li>
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
                        <p><a href="#" >{{ \Illuminate\Support\Facades\Auth::user()->address  }}</a></p>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 col-md-6">
                    <div class="single-contact-info-box" style="height: 216px;">
                        <div class="icon">
                            <i class="flaticon-phone-ringing"></i>
                        </div>
                        <h3>الهاتف</h3>
                        <p><a href="tel:16798">{{ \Illuminate\Support\Facades\Auth::user()->phone_number  }}</a></p>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 col-md-6">
                    <div class="single-contact-info-box" style="height: 216px;">
                        <div class="icon">
                            <i class="flaticon-email"></i>
                        </div>
                        <h3>البريد</h3>
                        <p>
                            {{ \Illuminate\Support\Facades\Auth::user()->email  }}
                        </p>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 col-md-6">
                    <div class="single-contact-info-box" style="height: 216px;">
                        <div class="icon">
                            <i class="flaticon-clock"></i>
                        </div>
                        <h3>الصورة</h3>
                        <img src="{{ \Illuminate\Support\Facades\Auth::user()->image  }}" style="width: 50px;">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="contact-area pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="contact-form">
                        <span class="sub-title">الملف الشخصي</span>
                        <h2>قم بتعديل الملف الشخصي الخاص بك من هنا</h2>
                        <br>
                        <form id="" method="post" action="{{ route('site.profile.update') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label>الاسم </label>
                                        <input type="text" name="name" value="{{ \Illuminate\Support\Facades\Auth::user()->name  }}"
                                               class="form-control" id="name"  required>
                                        @error('name')
                                        <div class="help-block with-errors">{{ $message }}</div>
                                        @enderror

                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label>البريد</label>
                                        <input type="email" name="email" class="form-control" id="email" style="text-align: right;direction: rtl"
                                               required value="{{ \Illuminate\Support\Facades\Auth::user()->email  }}">
                                        @error('email')
                                        <div class="help-block with-errors">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label>رقم الهاتف</label>
                                        <input type="text" name="phone_number" class="form-control" id="phone_number" required
                                               value="{{ \Illuminate\Support\Facades\Auth::user()->phone_number  }}">
                                        @error('phone_number')
                                        <div class="help-block with-errors">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label>العنوان</label>
                                        <input type="text" name="address" class="form-control" id="address" required
                                               value="{{ \Illuminate\Support\Facades\Auth::user()->address  }}">
                                        @error('address')
                                        <div class="help-block with-errors">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label>كلمة السر</label>
                                        <input type="password" name="password" class="form-control" id="password"  >
                                        @error('password')
                                        <div class="help-block with-errors">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label>تاكيد كلمة السر</label>
                                        <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label>الصورة</label>
                                        <input type="file" name="image" class="form-control" id="image" style="padding: 15px 27px;">
                                        @error('image')
                                        <div class="help-block with-errors">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <input type="hidden" id="id" name="id" value="{{ \Illuminate\Support\Facades\Auth::user()->id  }}">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <button type="submit" class="default-btn">ارسال</button>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
