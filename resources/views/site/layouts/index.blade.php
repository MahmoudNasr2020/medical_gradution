<!doctype html>
<html lang="ar" dir="rtl">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        @include('site.layouts.fronts.style')
    </head>
    <body>
        @include('site.layouts.parts.header')
        @yield('content')
        @include('site.layouts.parts.footer')
        <div class="go-top"><i class='bx bx-up-arrow-alt'></i></div>
        @include('site.layouts.fronts.script')
    </body>
</html>
