<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{asset('dashboard/js/jquery.fileuploader.min.js')}}"></script>
<script src="{{asset('dashboard/js/validatorjs.min.js')}}"></script>
<script src="{{asset('dashboard/js/favicon_notification.js')}}"></script>
<script src="{{asset('dashboard/js/main.js')}}"></script>
<script type="text/javascript">
    $('input[required],select[required],textarea[required]').parent().parent().find('>div:nth-of-type(1)').append('<span style="color:red;font-size:16px">*</span>');
    $("[name='title'],[name='slug'],[name='meta_description']").on('keypress',function(){
        $(this).parent().find('.last_appended_counter').remove();
        $(this).parent().append('<div class="col-12 p-2 last_appended_counter">' +
            '<span class="d-inline-block" style="font-size:13px">عدد الحروف ' +
            '<span style="font-weight:bolder;color:#007469;font-size:15px">'+$(this).val().length+'</span> حرفاً</span></div>');
    });

    $("[name='title'],[name='slug'],[name='description_ar'],[name='description_en'],[name='meta_description']").append(function(){
        $(this).parent().find('.last_appended_counter').remove();
        $(this).parent().append('<div class="col-12 p-2 last_appended_counter"><span class="d-inline-block" style="font-size:13px">عدد الحروف <span style="font-weight:bolder;color:#007469;font-size:15px">'+$(this).val().length+'</span> حرفاً</span></div>');
    });
    $(document).ready(function() {
        $('.select2-select').select2();
    });
</script>
@yield('scripts')
