<script>
    $(document).ready(function () {
        $('#update_cart_btn').on('click',function(e){
            e.preventDefault();
            let data = [];
            let route = "{{ route('site.cart.update') }}";
            $('.cart-entity').each(function () {
                let cart_id  =  $(this).data('cart_id');
                var quantity =  $(this).find('.quantity_input').val();
                data.push({cart_id:cart_id,quantity:quantity});
            });

            if(data.length > 0)
            {
                $.ajax({
                    url:route,
                    method:'POST',
                    data: {
                        'data':data,
                        '_token':"{{ csrf_token() }}"
                    },
                    success:function (data) {
                        Swal.fire({
                            icon: 'success',
                            title: 'تمت',
                            text: 'تم تحديث العربة بنجاح',
                            confirmButtonText: 'موافق',
                        });
                        $('#sub_price').text(data + ' جنيه مصري');
                        $('#total_price').text(data + ' جنيه مصري');
                    }
                });
            }
            else{
                Swal.fire({
                    icon: 'error',
                    title: 'خطأ',
                    text: 'لا يمكن تحديث العربة السلة فارغة',
                    confirmButtonText: 'موافق',
                });
                $('checkout-btn').remove();
            }
        });
    });
</script>
