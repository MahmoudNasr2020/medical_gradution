@extends('site.layouts.index')
@section('content')
    <!-- Start Page Title Area -->
    <section class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h1>الملف الشخصي</h1>
                <ul>
                    <li><a href="{{ route('site.home') }}">الرئيسية</a></li>
                    <li>الملف الشخصي</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- End Page Title Area -->
   <section class="product-details-area pt-70 pb-40">
   <div class="container">
     <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <!-- left menu section -->
                        <div class="col-md-4 mb-2 mb-md-0 pills-stacked">
                            <div class="card">
                                <div class="card-body box box-primary">
                                    <div class="box-body box-profile" >
                                        <img data-toggle="modal" data-target="#model_item_image"
                                             class="student-show-img profile-user-img img-responsive img-circle"
                                             src="{{ \Illuminate\Support\Facades\Auth::user()->image }}"
                                             alt="User profile picture"
                                            style="height: 100px;
                                            flex-shrink: 0;
                                            min-width: 100px;
                                            min-height: 100px;
                                            margin: 5px auto;
                                            width: 100px;
                                            padding: 3px;
                                            border: 3px solid #d2d6de;
                                            border-radius: 50%;
                                            display: block;
                                            cursor:pointer">
                                        <h3 class="profile-username text-center">{{ \Illuminate\Support\Facades\Auth::user()->name }}</h3>

                                        <ul class="list-group list-group-unbordered">

                                            <li class="list-group-item listnoback">
                                                <b>الاسم</b> <a class="pull-right text-aqua"
                                                                       style="float:left">{{ \Illuminate\Support\Facades\Auth::user()->name }}</a>
                                            </li>


                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- right content section -->
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-body" style="border-top: 3px solid #470938 ;">
                                    <ul class="nav nav-pills" style="border-bottom: 1px solid #ddd;border-top: 1px solid #ddd;margin-bottom: 29px;">
                                        <li class="nav-item" style="padding-top: 13px !important;padding-bottom: 10px !important;">
                                            <a class="nav-link active" id="base-pill31" href="{{ route('site.profile.edit') }}"
                                               aria-expanded="true" style="background:#470938 !important">
                                                تعديل
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="list_view">
                                            <div class="tshadow mb25 bozero" style="border: 1px solid #e7ebf0;">
                                                <h3 class="pagetitleh2" style="background: #f2f2f2;margin: 0;font-size: 16px;padding: 8px 14px;color: #000;
                                                box-shadow: 0 0px 2px rgb(0 0 0 / 20%);
                                                border-bottom: 1px solid #d7dfe3;">التفاصيل العامة</h3>
                                                <div class="table-responsive around10 pt0" style="padding: 10px;padding-top: 30px !important;">
                                                    <table class="table table-hover table-striped tmb0 table-student-show" >
                                                        <tbody>
                                                        <tr>
                                                            <td class="col-md-4" >الاسم</td>
                                                            <td class="col-md-5" >{{ \Illuminate\Support\Facades\Auth::user()->name }}</td>
                                                        </tr>

                                                        <tr>
                                                            <td> البريد</td>
                                                            <td>{{ \Illuminate\Support\Facades\Auth::user()->email }}</td>
                                                        </tr>

                                                        <tr>
                                                            <td> الهاتف</td>
                                                            <td>{{ \Illuminate\Support\Facades\Auth::user()->phone_number }}</td>
                                                        </tr>

                                                        <tr>
                                                            <td> العنوان</td>
                                                            <td>{{ \Illuminate\Support\Facades\Auth::user()->address }}</td>
                                                        </tr>


                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        </div>
    </section>

@endsection
