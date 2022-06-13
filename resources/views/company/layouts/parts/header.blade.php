<div class="col-12 px-0 d-flex justify-content-between top-nav" style="height: 60px;box-shadow: 0px 0px 12px #f1f1f1;background: #fff;position: fixed;width: 100%;width: calc(100% - 280px);z-index: 1000;">
    <div class="col-12 px-0 d-flex justify-content-center align-items-center btn btn-light asideToggle" style="width: 60px;height: 60px;">
        <span class="fal fa-bars font-4"></span>
    </div>
    <div class="col-12 px-0 d-flex justify-content-end  " style="height: 60px;">
        <div class="col-12 px-0 d-flex justify-content-center align-items-center  dropdown"  style="width: 60px;height: 60px;" >
            <div style="width: 60px;height: 60px;cursor: pointer;" data-bs-toggle="dropdown" aria-expanded="false" class="d-flex justify-content-center align-items-center cursor-pointer">
                <img src="https://www.jing.fm/clipimg/full/38-382519_business-corporation-brand-relations-subscribe-public-corporation-icon.png" style="padding: 10px;border-radius: 50%;width: 60px;height: 60px;">
            </div>
            <ul class="dropdown-menu shadow border-0" aria-labelledby="dropdownMenuButton1" >
                <li><a class="dropdown-item font-1" href="{{ route('site.home') }}" target="_blank"><span class="fal fa-desktop font-1"></span> عرض الموقع</a></li>
                <li><a class="dropdown-item font-1" href=""><span class="fal fa-user font-1"></span> ملفي الشخصي</a></li>

                <li><a class="dropdown-item font-1" href=""><span class="fal fa-edit font-1"></span> تعديل ملفي الشخصي</a></li>
                <li><hr style="height: 1px;margin: 10px 0px 5px;"></li>
                <li><a class="dropdown-item font-1" href="#" onclick="event.preventDefault();document.getElementById('form_company_logout').submit()">
                        <span class="fal fa-sign-out-alt font-1"></span> تسجيل خروج</a></li>
                <form class="d-none" method="post" action="{{ route('company.logout') }}" id="form_company_logout">
                    @csrf
                </form>
            </ul>

        </div>

        <div class="dropdown" style="width: 60px;height: 60px;background: #2381c6">
            <span class="d-inline-block fal fa-user"></span>
        </div>

    </div>
</div>
