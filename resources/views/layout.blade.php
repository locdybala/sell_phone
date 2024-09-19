<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <!-- CSS here -->
    <meta charset="utf-8">
    <title>Vật liệu sinh học</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('frontend/lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset('frontend/css/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
          integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
</head>
<body>
<div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="preloader-circle"></div>
            <div class="preloader-img pere-text">
                <img src="{{asset('frontend/assets/img/logo/logo.png')}}" alt="">
            </div>
        </div>
    </div>
</div>
@include('pages.layout.header')
<main>
    @yield('content')
</main>
@include('pages.layout.footer')
</body>
<!-- Toastr JS -->
<!-- JavaScript Libraries -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('frontend/lib/easing/easing.min.js')}}"></script>
<script src="{{asset('frontend/lib/waypoints/waypoints.min.js')}}"></script>
<script src="{{asset('frontend/lib/lightbox/js/lightbox.min.js')}}"></script>
<script src="{{asset('frontend/lib/owlcarousel/owl.carousel.min.js')}}"></script>

<!-- Template Javascript -->
<script src="{{asset('frontend/js/main.js')}}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
@yield('javascript')
<script type="text/javascript">
    $(document).ready(function () {
        $('.add-to-cart').click(function () {
            debugger;
            var id = $(this).data('id_product');
            var cart_product_id = parseInt($('.cart_product_id_' + id).val(), 10);
            var cart_product_name = $('.cart_product_name_' + id).val();
            var cart_product_image = $('.cart_product_image_' + id).val();
            var cart_product_price = parseInt($('.cart_product_price_' + id).val(), 10);
            var cart_product_quantity = parseInt($('.cart_product_quantity_' + id).val(), 10);
            var cart_product_qty = parseInt($('.cart_product_qty_' + id).val(), 10);
            var _token = $('input[name="_token"]').val();
            if (cart_product_qty >= cart_product_quantity) {
                toastr["error"]('Số lượng đặt lớn hơn số lượng còn trong kho, Vui lòng chọn số lượng nhỏ hơn ' + cart_product_quantity);
            } else {
                $.ajax({
                    url: '{{url('/add-cart-ajax')}}',
                    method: 'POST',
                    data: {
                        cart_product_id: cart_product_id,
                        cart_product_name: cart_product_name,
                        cart_product_quantity: cart_product_quantity,
                        cart_product_image: cart_product_image,
                        cart_product_price: cart_product_price,
                        cart_product_qty: cart_product_qty,
                        _token: _token
                    },
                    success: function () {

                        swal({
                            title: "Đã thêm sản phẩm vào giỏ hàng",
                            text: "Bạn có thể mua hàng tiếp hoặc tới giỏ hàng để tiến hành thanh toán",
                            cancel: "Xem tiếp",
                            icon: "success",
                            buttons: ["Xem tiếp", "Đi đến giỏ hàng"],
                            dangerMode: true,
                        })
                            .then((willDelete) => {
                                if (willDelete) {
                                    window.location.href = "{{url('/cart')}}";
                                }
                            });
                    }

                });
            }
        })
    });
</script>
</body>

</html>
