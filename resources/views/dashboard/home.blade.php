@extends('dashboard.layouts.index')
@section('content')
    <div class="col-12 py-3">
        <div class="container">
            <div class=" d-flex row m-0">
                <div class="col-12 col-lg-6 my-2" style="width: 100%;">
                    <div class="col-12 py-3">
                        <div class="container">
                            <div class=" d-flex row m-0">
                                <div class="col-12 col-lg-6 my-2" style="width: 100%;">
                                    <div class="col-12 py-2 px-3 row">
                                        <div class="col-4 col-sm-6 col-lg-4 col-xl-3 col-xxl-2 px-2 mb-3">
                                            <div class="col-12 px-0 py-2 d-flex rounded-3 main-box-wedit" style="background: #f3ffed;">
                                                <div style="width: 80px;" class="p-2">
                                                    <div class="col-12 px-0 text-center d-flex align-items-center justify-content-center" style="background-image: linear-gradient(rgba(0,0,0,.04),rgba(0,0,0,.04))!important;height: 64px;border-radius: 50%;">
                                                        <span class="fal fa-bells font-5" ></span>
                                                    </div>
                                                </div>
                                                <div style="width: calc(100% - 80px)" class="px-2 py-2">
                                                    <h6 class="font-1">الموقع </h6>
                                                    <h6 class="font-3"><a href="{{ route('site.home') }}" target="_blank" style="font-size: 15px">عرض الموقع</a></h6>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-4 col-sm-6 col-lg-4 col-xl-3 col-xxl-2 px-2 mb-3">
                                            <div class="col-12 px-0 py-2 d-flex rounded-3 main-box-wedit" style="background: #f3ffed;">
                                                <div style="width: 80px;" class="p-2">
                                                    <div class="col-12 px-0 text-center d-flex align-items-center justify-content-center" style="background-image: linear-gradient(rgba(0,0,0,.04),rgba(0,0,0,.04))!important;height: 64px;border-radius: 50%;">
                                                        <span class="fal fa-bells font-5" ></span>
                                                    </div>
                                                </div>
                                                <div style="width: calc(100% - 80px)" class="px-2 py-2">
                                                    <h6 class="font-1"><a href="{{ route('dashboard.product.index') }}">المنتجات</a> </h6>
                                                    <h6 class="font-3">{{ \App\Models\Product::get()->count() }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4 col-sm-6 col-lg-4 col-xl-3 col-xxl-2 px-2 mb-3">
                                            <div class="col-12 px-0 py-2 d-flex rounded-3 main-box-wedit" style="background: #f3ffed;">
                                                <div style="width: 80px;" class="p-2">
                                                    <div class="col-12 px-0 text-center d-flex align-items-center justify-content-center" style="background-image: linear-gradient(rgba(0,0,0,.04),rgba(0,0,0,.04))!important;height: 64px;border-radius: 50%;">
                                                        <span class="fal fa-bells font-5" ></span>
                                                    </div>
                                                </div>
                                                @php
                                                    use App\Models\BestSeller;
                                                    use App\Models\Product;
                                                    use Illuminate\Support\Facades\Auth;
                                                    $products = BestSeller::all();
                                                    $company_products=[];
                                                    foreach ($products as $product)
                                                    {
                                                        $item = Product::first();
                                                        if($item)
                                                        {
                                                             $item->quantity = $product->quantity;
                                                             array_push($company_products,$item);
                                                        }
                                                    }
                                                @endphp
                                                <div style="width: calc(100% - 80px)" class="px-2 py-2">
                                                    <h6 class="font-1">المنتجات المباعة </h6>
                                                    <h6 class="font-3">{{ count($company_products) }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4 col-sm-6 col-lg-4 col-xl-3 col-xxl-2 px-2 mb-3">
                                            <div class="col-12 px-0 py-2 d-flex rounded-3 main-box-wedit" style="background: #f3ffed;">
                                                <div style="width: 80px;" class="p-2">
                                                    <div class="col-12 px-0 text-center d-flex align-items-center justify-content-center" style="background-image: linear-gradient(rgba(0,0,0,.04),rgba(0,0,0,.04))!important;height: 64px;border-radius: 50%;">
                                                        <span class="fal fa-bells font-5" ></span>
                                                    </div>
                                                </div>
                                                <div style="width: calc(100% - 80px)" class="px-2 py-2">
                                                    <h6 class="font-1"><a href="{{ route('dashboard.user.index') }}">المستخدمين</a> </h6>
                                                    <h6 class="font-3">{{ \App\Models\User::get()->count() }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4 col-sm-6 col-lg-4 col-xl-3 col-xxl-2 px-2 mb-3">
                                            <div class="col-12 px-0 py-2 d-flex rounded-3 main-box-wedit" style="background: #f3ffed;">
                                                <div style="width: 80px;" class="p-2">
                                                    <div class="col-12 px-0 text-center d-flex align-items-center justify-content-center" style="background-image: linear-gradient(rgba(0,0,0,.04),rgba(0,0,0,.04))!important;height: 64px;border-radius: 50%;">
                                                        <span class="fal fa-bells font-5" ></span>
                                                    </div>
                                                </div>
                                                <div style="width: calc(100% - 80px)" class="px-2 py-2">
                                                    <h6 class="font-1"><a href="{{ route('dashboard.company.index') }}">الشركات</a> </h6>
                                                    <h6 class="font-3">{{ \App\Models\Company::get()->count() }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4 col-sm-6 col-lg-4 col-xl-3 col-xxl-2 px-2 mb-3">
                                            <div class="col-12 px-0 py-2 d-flex rounded-3 main-box-wedit" style="background: #f3ffed;">
                                                <div style="width: 80px;" class="p-2">
                                                    <div class="col-12 px-0 text-center d-flex align-items-center justify-content-center" style="background-image: linear-gradient(rgba(0,0,0,.04),rgba(0,0,0,.04))!important;height: 64px;border-radius: 50%;">
                                                        <span class="fal fa-bells font-5" ></span>
                                                    </div>
                                                </div>
                                                <div style="width: calc(100% - 80px)" class="px-2 py-2">
                                                    <h6 class="font-1"><a href="{{ route('dashboard.order.index') }}">الطلبات</a> </h6>
                                                    <h6 class="font-3">{{ \App\Models\Order::get()->count() }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4 col-sm-6 col-lg-4 col-xl-3 col-xxl-2 px-2 mb-3">
                                            <div class="col-12 px-0 py-2 d-flex rounded-3 main-box-wedit" style="background: #f3ffed;">
                                                <div style="width: 80px;" class="p-2">
                                                    <div class="col-12 px-0 text-center d-flex align-items-center justify-content-center" style="background-image: linear-gradient(rgba(0,0,0,.04),rgba(0,0,0,.04))!important;height: 64px;border-radius: 50%;">
                                                        <span class="fal fa-bells font-5" ></span>
                                                    </div>
                                                </div>
                                                <div style="width: calc(100% - 80px)" class="px-2 py-2">
                                                    <h6 class="font-1">الاعدادات </h6>
                                                    <h6 class="font-3"><a href="{{ route('dashboard.setting.index') }}">عرض</a></h6></h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4 col-sm-6 col-lg-4 col-xl-3 col-xxl-2 px-2 mb-3">
                                            <div class="col-12 px-0 py-2 d-flex rounded-3 main-box-wedit" style="background: #f3ffed;">
                                                <div style="width: 80px;" class="p-2">
                                                    <div class="col-12 px-0 text-center d-flex align-items-center justify-content-center" style="background-image: linear-gradient(rgba(0,0,0,.04),rgba(0,0,0,.04))!important;height: 64px;border-radius: 50%;">
                                                        <span class="fal fa-bells font-5" ></span>
                                                    </div>
                                                </div>

                                                <div style="width: calc(100% - 80px)" class="px-2 py-2">
                                                    <h6 class="font-1">اجمالي الربح </h6>
                                                    <h6 class="font-3">1200 جنيه </h6>
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
    <div class="col-12 py-3">
        <div class="container">
            <div class="p-3 main-box mx-auto" style="width:600px;max-width: 100%;">
                <div class="d-flex align-items-center justify-content-center py-4">
                    <div class="col-12 d-flex justify-content-center align-items-center mx-auto " style="width:100%">
                        <div class="col-12 p-0 text-center">
                            <img src="{{ \Illuminate\Support\Facades\Auth::guard('admin')->user()->image }}" style="width:120px;max-width: 100%;border-radius: 50%;" class="d-inline-block">
                            <div class="col-12 font-3 text-center py-2">
                                {{\Illuminate\Support\Facades\Auth::guard('admin')->user()->name}}
                            </div>
                        </div>

                    </div>

                </div>
                <div class="col-12 p-0">
                    <table class="table table-bordered table-striped rounded table-hover">
                        <tbody>
                        <tr>
                            <td>البريد الإلكتروني</td>
                            <td>{{\Illuminate\Support\Facades\Auth::guard('admin')->user()->email}}</td>
                        </tr>
                        <tr>
                            <td>تحكم</td>
                            <td><a href="{{ route('dashboard.profile.edit') }}" class="btn btn-light btn-sm border"><span class="fal fa-wrench"></span> تعديل</a></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
