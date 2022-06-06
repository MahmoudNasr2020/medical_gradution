<div class="col-12 px-0 d-flex justify-content-between top-nav" style="height: 60px;box-shadow: 0px 0px 12px #f1f1f1;background: #fff;position: fixed;width: 100%;width: calc(100% - 280px);z-index: 1000;">
    <div class="col-12 px-0 d-flex justify-content-center align-items-center btn btn-light asideToggle" style="width: 60px;height: 60px;">
        <span class="fal fa-bars font-4"></span>
    </div>
    <div class="col-12 px-0 d-flex justify-content-end  " style="height: 60px;">
        <div class="btn-group" id="notificationDropdown">

            <div class="col-12 px-0 d-flex justify-content-center align-items-center btn btn-light " style="width: 60px;height: 60px;" data-bs-toggle="dropdown" aria-expanded="false" id="dropdown-notifications">
                <span class="fas fa-bell font-4 d-inline-block" style="color: #ff9800;transform: rotate(15deg)"></span>
            </div>
            <div class="dropdown-menu py-0 rounded-0 border-0 shadow " style="cursor: auto!important;z-index: 20000;width: 350px;height: 450px;">
                <div class="col-12 notifications-container" style="height:406px;overflow: auto;">

                </div>
                <div class="col-12 d-flex border-top">
                    <a href="" class="d-block py-2 px-3 ">
                        <div class="col-12 align-items-center">
                            <span class="fal fa-bells"></span>  عرض كل الإشعارات
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-12 px-0 d-flex justify-content-center align-items-center  dropdown"  style="width: 60px;height: 60px;" >
            <div style="width: 60px;height: 60px;cursor: pointer;" data-bs-toggle="dropdown" aria-expanded="false" class="d-flex justify-content-center align-items-center cursor-pointer">
                <img src="{{ asset('dashboard/images/default/admin.png') }}" style="padding: 10px;border-radius: 50%;width: 60px;height: 60px;">
            </div>
            <ul class="dropdown-menu shadow border-0" aria-labelledby="dropdownMenuButton1" >
                <li><a class="dropdown-item font-1" href="/" target="_blank"><span class="fal fa-desktop font-1"></span> عرض الموقع</a></li>
                <li><a class="dropdown-item font-1" href=""><span class="fal fa-user font-1"></span> ملفي الشخصي</a></li>

                <li><a class="dropdown-item font-1" href=""><span class="fal fa-edit font-1"></span> تعديل ملفي الشخصي</a></li>
                <li><a class="dropdown-item font-1" href=""><span class="fal fa-directions font-1"></span> التحويلات</a></li>
                <li><a class="dropdown-item font-1" href=""><span class="fal fa-file font-1"></span> الملفات</a></li>
                <li><a class="dropdown-item font-1" href=""><span class="fal fa-traffic-light font-1"></span> الترافيك</a></li>
                <li><a class="dropdown-item font-1" href=""><span class="fal fa-bug font-1"></span> تقارير الأخطاء</a></li>
                <li><hr style="height: 1px;margin: 10px 0px 5px;"></li>
                <li><a class="dropdown-item font-1" href="#" onclick=""><span class="fal fa-sign-out-alt font-1"></span> تسجيل خروج</a></li>
            </ul>

        </div>

        <div class="dropdown" style="width: 60px;height: 60px;background: #2381c6">
            <span class="d-inline-block fal fa-user"></span>
        </div>

    </div>
</div>
