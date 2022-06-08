@extends('site.layouts.index')
@section('style')
    <style type="text/css">
        .settings-tab-opener{
            box-shadow: 0px 6px 12px #ebebeb;
            border-radius:11px;
            cursor: pointer;
            width:115px;
            height: 45px;
        }
        .settings-tab-opener.active{
            box-shadow: 0px 6px 12px #c8e0ff!important;
            color: #fff;
            background: #2196f3;
        }
        .nav-link.active
        {
            color: #0d6efd  !important;
            border-color:transparent !important;
            background-color: transparent !important;
        }
        .nav-link
        {
            color: #495057 !important;
        }

        .nav-tabs .nav-link:focus, .nav-tabs .nav-link:hover {
            border-color: transparent !important;
        }
        .nav-tabs {
            border-bottom: 1px solid transparent !important;
        }

    </style>
@stop
@section('content')
    <!-- Start Page Title Area -->
    <section class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h1>مستخدم جديد</h1>
                <ul>
                    <li><a href="{{ route('site.home') }}">الرئيسية</a></li>
                    <li>مستخدم جديد</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- End Page Title Area -->

    <!-- Start Profile Authentication Area -->
    <section class="profile-authentication-area ptb-70">
        <div class="container">
            <div class="row" >
                <ul class="nav nav-tabs" id="myTab" role="tablist" style="justify-content: center; margin-bottom: 14px">
                    <li class="nav-item settings-tab-opener" role="presentation" style="margin-left: 10px">
                        <button class="nav-link active" id="user-tab" data-bs-toggle="tab" data-bs-target="#user-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">
                            مستخدم  <i class="bx bx-user" style="font-size: 19px; position: relative; top: 3px;right: 8px;"></i>
                        </button>
                    </li>
                    <li class="nav-item settings-tab-opener" role="presentation" style="margin-left: 10px">
                        <button class="nav-link" id="company-tab" data-bs-toggle="tab" data-bs-target="#company-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">
                            شركة
                            <i class="bx bx-building" style="font-size: 19px;position: relative;top: 3px;right: 8px;"></i></button>
                    </li>
                </ul>

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="user-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                        <div class="login-form">
                            <h2>مستخدم جديد</h2>

                            <form method="POST" action="{{ route('site.register.store') }}">
                                @csrf
                                <div class="form-group">
                                    <label>الاسم</label>
                                    <input type="text" class="form-control" name="name" required  placeholder="ادخل الاسم">
                                    @error('name')
                                    <div style="color: red;margin-top: 5px">{{ $message }}*</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>البريد الالكتروني</label>
                                    <input type="email" class="form-control" name="email" required  placeholder="ادخل البريد الالكتروني" style="text-align: right;">
                                    @error('email')
                                    <div style="color: red;margin-top: 5px">{{ $message }}*</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>رقم الهاتف</label>
                                    <input type="text" class="form-control" name="phone_number" required  placeholder="ادخل رقم الهاتف ">
                                    @error('phone_number')
                                    <div style="color: red;margin-top: 5px">{{ $message }}*</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>العنوان</label>
                                    <input type="text" class="form-control" name="address" required  placeholder="ادخل العنوان ">
                                    @error('address')
                                    <div style="color: red;margin-top: 5px">{{ $message }}*</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>كلمة السر</label>
                                    <input type="password" class="form-control" name="password" required placeholder="ادخل كلمة السر">
                                    @error('password')
                                    <div style="color: red;margin-top: 5px">{{ $message }}*</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label> تاكيد كلمة السر </label>
                                    <input type="password" class="form-control" name="password_confirmation" required  placeholder="تاكيد كلمة السر">
                                </div>

                                <button type="submit">تسجيل</button>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="company-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                        <div class="login-form">
                            <h2>شركة جديده</h2>

                            <form method="POST" action="{{ route('company.register.store') }}">
                                @csrf
                                <div class="form-group">
                                    <label>الاسم</label>
                                    <input type="text" class="form-control" name="name" required  placeholder="ادخل الاسم">
                                    @error('name')
                                    <div style="color: red;margin-top: 5px">{{ $message }}*</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>البريد الالكتروني</label>
                                    <input type="email" class="form-control" name="email" required  placeholder="ادخل البريد الالكتروني" style="text-align: right;">
                                    @error('email')
                                    <div style="color: red;margin-top: 5px">{{ $message }}*</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>رقم الهاتف</label>
                                    <input type="text" class="form-control" name="phone_number" required  placeholder="ادخل رقم الهاتف ">
                                    @error('phone_number')
                                    <div style="color: red;margin-top: 5px">{{ $message }}*</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>العنوان</label>
                                    <input type="text" class="form-control" name="location" required  placeholder="ادخل موقع الشركة ">
                                    @error('address')
                                    <div style="color: red;margin-top: 5px">{{ $message }}*</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>كلمة السر</label>
                                    <input type="password" class="form-control" name="password" required placeholder="ادخل كلمة السر">
                                    @error('password')
                                    <div style="color: red;margin-top: 5px">{{ $message }}*</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label> تاكيد كلمة السر </label>
                                    <input type="password" class="form-control" name="password_confirmation" required  placeholder="تاكيد كلمة السر">
                                </div>

                                <button type="submit">تسجيل</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Start Profile Authentication Area -->

@endsection
@section('script')
    <script src="{{asset('dashboard/js/validatorjs.min.js')}}"></script>

@endsection
