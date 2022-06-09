<script>
    $(document).on('click','.favourite',function(e){
        e.preventDefault();
        let product_id = $(this).data('product_id');
        let route="{{ route('site.favourite.store') }}";
        let auth = "{{ \Illuminate\Support\Facades\Auth::check() }}";
        if(auth)
        {
            if(!$(this).hasClass('active'))
            {
                $(this).addClass('active');
                $(this).css('background-color','#470938');
                $(this).css('color','#ffffff');
                $(this).find('.favourite_text').text('ازالة من المفضلة');
                $.ajax({
                    method:'post',
                    url:route,
                    data:{
                        "product_id":product_id,
                        "_token": "{{ csrf_token() }}",
                        "status":"not_active"
                    },
                    success:function(data){
                        if(data === 'exists')
                        {

                            Swal.fire({
                                icon: 'error',
                                title: 'خطأ',
                                text: 'تمت الاضافة بالفعل',
                                confirmButtonText: 'موافق',
                            });
                        }
                        else {
                            let cart_count = $('#fav_count');
                            let count = parseInt(cart_count.data('count'));
                            count ++ ;
                            cart_count.data('count',count);
                            cart_count.attr('data-count',count);
                            cart_count.text(count);
                        }

                    }
                });
            }
            else{
                $(this).removeClass('active');
                $(this).css('background-color','#ffffff');
                $(this).css('color','#111111');
                $(this).find('.favourite_text').text('اضف الي المفضلة');
                $.ajax({
                    method:'post',
                    url:route,
                    data:{
                        "product_id":product_id,
                        "_token": "{{ csrf_token() }}",
                        "status":"active"
                    },
                    success:function(data){
                        if(data === 'not_found')
                        {
                            Swal.fire({
                                icon: 'error',
                                title: 'خطأ',
                                text: 'تمت الازالة بالفعل',
                                confirmButtonText: 'موافق',
                            });
                        }
                        else
                        {
                            let cart_count = $('#fav_count');
                            let count = parseInt(cart_count.data('count'));
                            count -- ;
                            cart_count.data('count',count);
                            cart_count.attr('data-count',count);
                            cart_count.text(count);
                        }
                    }
                });
            }
        }

        else
        {
            Swal.fire({
                icon: 'error',
                title: 'خطأ',
                text: 'يجب تسجيل الدخول',
                confirmButtonText: 'موافق',
            });
        }


    });
</script>
