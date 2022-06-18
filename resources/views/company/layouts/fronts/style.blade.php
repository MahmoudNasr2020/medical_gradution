
    <link rel="stylesheet" type="text/css" href="https://nafezly.com/css/cust-fonts.css">
    <link href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://nafezly.com/css/responsive-font.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pace-js@latest/pace-theme-default.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet"  href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css" />
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/css/font-fileuploader.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/css/jquery.fileuploader.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/css/jquery.fileuploader-theme-dragdrop.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/css/main.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <title>لوحة تحكم | الشركات</title>
    @php
        $page_title="لوحة التحكم";
    @endphp
    @yield('styles')
    <style type="text/css">
        *:not([class^="fa"]){
            font-family: 'Noto Kufi Arabic', sans-serif;
        }
        .fa, .fas {
            font-family: "Font Awesome 5 Pro"!important;
            font-weight: 900;
        }
        ol,ul{
            padding: 5px 20px;
        }
        ol{
            list-style: auto;
        }
        ul{
            list-style: disc;
        }
        .select2-selection__arrow{
            margin-top: 2px;
        }
        .select2-selection{
            width: 100%!important;
            height: 38px!important;
            border-radius: 0px!important;
        }
        .select2{
            width: 100%!important;
        }
        pre{
            direction: ltr;
        }
    </style>
