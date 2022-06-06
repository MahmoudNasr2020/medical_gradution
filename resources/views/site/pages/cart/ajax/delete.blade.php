<script>
    $(document).on('click','.remove',function (e) {
        e.preventDefault();
        $(this).parents('.cart-entity').remove();
        let cart_id = $(this).data('cart_id');
        let route = "{{ route('site.cart.delete') }}";
        $.ajax({
            url:route,
            method:'POST',
            data: {
                'data':cart_id,
                '_token':"{{ csrf_token() }}"
            },
            success:function (data) {
                let cart_count = $('#cart_count');
                let count = parseInt(cart_count.data('count'));
                count -- ;
                cart_count.data('count',count);
                cart_count.attr('data-count',count);
                cart_count.text(count);
                $('#sub_price').text('$' + data);
                $('#total_price').text('$' + data);
                if(data == 0)
                {
                    $('#checkout-btn').remove();
                }
            }
        });
    })
</script>
