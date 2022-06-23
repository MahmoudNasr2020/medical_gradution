<div style="width: 280px;background: #11233b;min-height: 100vh;position: fixed;z-index: 100" class="aside active">
    <div class="col-12 px-0 d-flex" style="height: 60px;background: #1a2d4d">
        <div class="col-12 px-2 font-3  d-flex  justify-content-center pt-md-1" style="color: #fff">
            <span class="fal fa-chart-pie font-4 pt-3 d-inline-block "></span>
            <span class="d-inline-block px-2 pt-2">لوحة التحكم</span>
            <div class="d-flex d-md-none justify-content-center align-items-center px-0   asideToggle" style="width: 40px;height: 40px;">
                <span class="fal fa-bars font-4 cursor-pointer"></span>
            </div>
        </div>
    </div>
    <div class="col-12 px-0 py-5 text-center justify-content-center align-items-center ">
        <a href="">
            <img src="{{ \Illuminate\Support\Facades\Auth::guard('admin')->user()->image }}" style="width: 40px;height: 40px;color: #fff;border-radius: 50%" class="d-inline-block">
        </a>
        <div class="col-12 px-0 mt-2" style="color: #fff">
            مرحباً
        </div>
    </div>
    <div class="col-12 px-0">
        <div class="col-12 px-0 aside-menu" style="height: calc(100vh - 250px);overflow: auto;">

            <a href="{{ route('dashboard.home') }}" class="col-12 px-0">
                <div class="col-12 item px-0 d-flex" >
                    <div style="width: 50px" class="px-3 text-center">
                        <span class="fal fa-home font-3"> </span>
                    </div>
                    <div style="width: calc(100% - 50px)" class="px-2">
                        الرئيسية
                    </div>
                </div>
            </a>

            <a href="{{ route('dashboard.category.index') }}" class="col-12 px-0">
                <div class="col-12 item px-0 d-flex " >
                    <div style="width: 50px" class="px-3 text-center">
                        <span class="fal fa-tag font-3"> </span>
                    </div>
                    <div style="width: calc(100% - 50px)" class="px-2">
                        الأقسام
                    </div>
                </div>
            </a>

            <a href="{{ route('dashboard.product.index') }}" class="col-12 px-0">
                <div class="col-12 item px-0 d-flex " >
                    <div style="width: 50px" class="px-3 text-center">
                        <span class="fal fa-list font-3"> </span>
                    </div>
                    <div style="width: calc(100% - 50px)" class="px-2">
                        المنتجات
                    </div>
                </div>
            </a>


            <a href="{{ route('dashboard.user.index') }}" class="col-12 px-0">
                    <div class="col-12 item px-0 d-flex " >
                        <div style="width: 50px" class="px-3 text-center">
                            <span class="fal fa-users font-3"> </span>
                        </div>
                        <div style="width: calc(100% - 50px)" class="px-2">
                            المستخدمين
                        </div>
                    </div>
                </a>

            <a href="{{ route('dashboard.company.index') }}" class="col-12 px-0">
                    <div class="col-12 item px-0 d-flex " >
                        <div style="width: 50px" class="px-3 text-center">
                            <span class="fal fa-building font-3"> </span>
                        </div>
                        <div style="width: calc(100% - 50px)" class="px-2">
                            الشركات
                        </div>
                    </div>
                </a>

            <a href="{{ route('dashboard.order.index') }}" class="col-12 px-0">
                <div class="col-12 item px-0 d-flex " >
                    <div style="width: 50px" class="px-3 text-center">
                        <span class="fal fa-cart-arrow-down font-3"> </span>
                    </div>
                    <div style="width: calc(100% - 50px)" class="px-2">
                        الطلبات
                    </div>
                </div>
            </a>

                <a href="{{ route('dashboard.contact.index') }}" class="col-12 px-0">
                    <div class="col-12 item px-0 d-flex " >
                        <div style="width: 50px" class="px-3 text-center">
                            <span class="fal fa-phone font-3"> </span>
                        </div>
                        <div style="width: calc(100% - 50px)" class="px-2">
                            اتصل بنا
                        </div>
                    </div>
                </a>

            <a href="{{ route('dashboard.admin.index') }}" class="col-12 px-0">
                <div class="col-12 item px-0 d-flex " >
                    <div style="width: 50px" class="px-3 text-center">
                        <span class="fal fa-user font-3"> </span>
                    </div>
                    <div style="width: calc(100% - 50px)" class="px-2">
                        المسؤولين
                    </div>
                </div>
            </a>

            <a href="{{ route('dashboard.budget.index') }}" class="col-12 px-0">
                <div class="col-12 item px-0 d-flex " >
                    <div style="width: 50px" class="px-3 text-center">
                        <span class="fal fa-badge-dollar font-3"> </span>
                    </div>
                    <div style="width: calc(100% - 50px)" class="px-2">
                        المحفظة
                    </div>
                </div>
            </a>

            <a href="{{ route('dashboard.setting.index') }}" class="col-12 px-0">
                    <div class="col-12 item px-0 d-flex " >
                        <div style="width: 50px" class="px-3 text-center">
                            <span class="fal fa-wrench font-3"> </span>
                        </div>
                        <div style="width: calc(100% - 50px)" class="px-2">
                            الإعدادات
                        </div>
                    </div>
                </a>



        </div>
    </div>

</div>
