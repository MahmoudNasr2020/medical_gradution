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
            <img src="{{ asset('dashboard/images/default/admin.png') }}" style="width: 40px;height: 40px;color: #fff;border-radius: 50%" class="d-inline-block">
        </a>
        <div class="col-12 px-0 mt-2" style="color: #fff">
            مرحباً
        </div>
    </div>
    <div class="col-12 px-0">
        <div class="col-12 px-0 aside-menu" style="height: calc(100vh - 250px);overflow: auto;">

            <a href="" class="col-12 px-0">
                <div class="col-12 item px-0 d-flex" >
                    <div style="width: 50px" class="px-3 text-center">
                        <span class="fal fa-home font-3"> </span>
                    </div>
                    <div style="width: calc(100% - 50px)" class="px-2">
                        الرئيسية
                    </div>
                </div>
            </a>

                <a href="" class="col-12 px-0">
                    <div class="col-12 item px-0 d-flex " >
                        <div style="width: 50px" class="px-3 text-center">
                            <span class="fal fa-users font-3"> </span>
                        </div>
                        <div style="width: calc(100% - 50px)" class="px-2">
                            المستخدمين
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


                <a href="" class="col-12 px-0">
                    <div class="col-12 item px-0 d-flex " >
                        <div style="width: 50px" class="px-3 text-center">
                            <span class="fal fa-newspaper font-3"> </span>
                        </div>
                        <div style="width: calc(100% - 50px)" class="px-2">
                            المقالات
                        </div>
                    </div>
                </a>



                <a href="" class="col-12 px-0">
                    <div class="col-12 item px-0 d-flex " >
                        <div style="width: 50px" class="px-3 text-center">
                            <span class="fal fa-bullhorn font-3"> </span>
                        </div>
                        <div style="width: calc(100% - 50px)" class="px-2">
                            الإعلانات
                        </div>
                    </div>
                </a>



                <a href="" class="col-12 px-0">
                    <div class="col-12 item px-0 d-flex " >
                        <div style="width: 50px" class="px-3 text-center">
                            <span class="fal fa-file-invoice font-3"> </span>
                        </div>
                        <div style="width: calc(100% - 50px)" class="px-2">
                            الصفحات
                        </div>
                    </div>
                </a>


                <a href="" class="col-12 px-0">
                    <div class="col-12 item px-0 d-flex " >
                        <div style="width: 50px" class="px-3 text-center">
                            <span class="fal fa-list font-3"> </span>
                        </div>
                        <div style="width: calc(100% - 50px)" class="px-2">
                            القوائم
                        </div>
                    </div>
                </a>


                <a href="" class="col-12 px-0">
                    <div class="col-12 item px-0 d-flex " >
                        <div style="width: 50px" class="px-3 text-center">
                            <span class="fal fa-question font-3"> </span>
                        </div>
                        <div style="width: calc(100% - 50px)" class="px-2">
                            الأسئلة الشائعة
                        </div>
                    </div>
                </a>


                <a href="" class="col-12 px-0">
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
