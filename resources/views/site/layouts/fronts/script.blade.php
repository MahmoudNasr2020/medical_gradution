<!-- Links of JS files -->
<script src="{{ asset('site/assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('site/assets/js/popper.min.js') }}"></script>
<script src="{{ asset('site/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('site/assets/js/magnific-popup.min.js') }}"></script>
<script src="{{ asset('site/assets/js/fancybox.min.js') }}"></script>
<script src="{{ asset('site/assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('site/assets/js/owl.carousel2.thumbs.min.js') }}"></script>
<script src="{{ asset('site/assets/js/meanmenu.min.js') }}"></script>
<script src="{{ asset('site/assets/js/nice-select.min.js') }}"></script>
<script src="{{ asset('site/assets/js/rangeSlider.min.js') }}"></script>
<script src="{{ asset('site/assets/js/sticky-sidebar.min.js') }}"></script>
<script src="{{ asset('site/assets/js/wow.min.js') }}"></script>
<script src="{{ asset('site/assets/js/form-validator.min.js') }}"></script>
<script src="{{ asset('site/assets/js/contact-form-script.js') }}"></script>
<script src="{{ asset('site/assets/js/ajaxchimp.min.js') }}"></script>
<script src="{{ asset('site/assets/js/main.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.17/dist/sweetalert2.min.js"></script>

<script>
    @if(\Illuminate\Support\Facades\Session::has('payment') && \Illuminate\Support\Facades\Session::get('payment') == 'success')
        Swal.fire({
            icon: 'success',
            title: 'تمت',
            text: 'تم الدفع بنجاح',
            confirmButtonText: 'موافق',
        });
    @endif
   @if(\Illuminate\Support\Facades\Session::has('fav_delete') && \Illuminate\Support\Facades\Session::get('fav_delete') == 'success')
        Swal.fire({
            icon: 'success',
            title: 'تمت',
            text: 'تمت الازالة بنجاح',
            confirmButtonText: 'موافق',
        });
    @endif

    @if(\Illuminate\Support\Facades\Session::has('msgContact') && \Illuminate\Support\Facades\Session::get('msgContact') == 'success')
        Swal.fire({
            icon: 'success',
            title: 'تمت',
            text: 'تم الارسال بنجاح',
            confirmButtonText: 'موافق',
        });
    @endif

    @if(\Illuminate\Support\Facades\Session::has('login_error') )
        Swal.fire({
            icon: 'error',
            title: 'فشلت',
            text: '{{  \Illuminate\Support\Facades\Session::get('login_error') }}',
            confirmButtonText: 'موافق',
        });
    @endif
</script>
@yield('script')
