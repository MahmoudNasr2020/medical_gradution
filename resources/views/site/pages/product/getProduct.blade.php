<script>
    $(document).on('click','.product-view',function (e) {
        e.preventDefault();
        let id = $(this).data('id');
        let route = "{{ route('site.product.getProduct') }}";
        $('#image_modal').attr('src','');
        $('#product_name').text('');
        $('#price').text('');
        $('#category_name').text('');
        $('#country_production').text('');
        $('#product_desc').text('');
        $.ajax({
            method:'post',
            url:route,
            data:{
                "id":id,
                "_token": "{{ csrf_token() }}"
            },
            success:function(data){
                $('#image_modal').attr('src',data.image);
                $('#product_name').text(data.name);
                $('#price').text(data.price + '$');
                $('#category_name').text(data.category.category_name);
                $('#country_production').text(data.production_country);
                $('#product_desc').text(data.description);
                $('#productsQuickView').modal('show');
            }
        });
    });
</script>
