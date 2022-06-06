<script>
    $(document).on('click','.add_to_cart',function(e){
        e.preventDefault();
        let product_id = $(this).data('product_id');
        let route = "{{ route('site.cart.store') }}";
        let auth = "{{ \Illuminate\Support\Facades\Auth::check() }}";
        if(!auth)
        {
            Swal.fire({
                icon: 'error',
                title: 'خطأ',
                text: 'يجب تسجيل الدخول',
                confirmButtonText: 'موافق',
            });
        }
        $.ajax({
            url:route,
            method:'POST',
            data:{
                'product_id' :product_id,
                '_token':"{{ csrf_token() }}"
            },
            success:function (data) {
                if(data === 'new_cart')
                {
                    let cart_count = $('#cart_count');
                    let count = parseInt(cart_count.data('count'));
                    count ++ ;
                    cart_count.data('count',count);
                    cart_count.attr('data-count',count);
                    cart_count.text(count);
                }
                else if(data==='error')
                {
                    confirm('هذا المنتج غير موجود');
                }
            }
        });
    });
</script>
