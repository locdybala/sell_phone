@extends('layout')
@section('content')
    <style>
        .button_wishlist:hover {
            border: none !important;
            background: #fff !important;
        }
    </style>
    <!--? slider Area Start -->
    <div style="height: 600px !important; width: 1920px; margin: 0px auto" class="slider-area ">
        <div class="slider-active">
            <!-- Single Slider -->
            @foreach($sliders as $slider)
            <div style="background-image: url('upload/slider/{{$slider->slider_image}}'); " class="single-slider slider-height d-flex align-items-center slide-bg">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8">
                            <div class="hero__caption">
                                <h1 data-animation="fadeInLeft" data-delay=".4s"
                                    data-duration="2000ms"></h1>
                                <p data-animation="fadeInLeft" data-delay=".7s"
                                   data-duration="2000ms"></p>
                                <!-- Hero-btn -->
                            </div>
                        </div>
                    </div>
            </div>
            @endforeach
            <!-- Single Slider -->

        </div>
    </div>
    <!-- slider Area End-->
    <!-- ? New Product Start -->
    <section style="padding: 50px 0 50px 0;" class="new-product-area section-padding2">
        <div class="container">
            <!-- Section tittle -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="section-tittle mb-70">
                        <h2>Sản phẩm mới</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($productNews as $product)
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                        <div class="single-new-pro mb-30 text-center productinfo">
                            <div class="product-img">
                                <img style="height: 400px" src="/upload/product/{{ $product->product_image }}" alt="">
                            </div>
                            <div class="product-caption">
                                <h3>
                                    <a href="{{ route('detailProduct',['id'=>$product->product_id]) }}">{{$product->product_name}}</a>
                                </h3>
                                <span>{{number_format($product->product_price)}} đ</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- ? New Product Start -->
    <div style="padding-bottom: 50px;" class="popular-items section-paddingt2">
        <div class="container">
            <!-- Section tittle -->
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-8 col-md-10">
                    <div class="section-tittle mb-70 text-center">
                        <h2>Sản phẩm bán chạy</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($productSolds as $product)
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                        <form>
                            @csrf
                            <input type="hidden" id="wishlish_product_id_{{$product->product_id}}"
                                   value="{{$product->product_id}}"
                                   class="cart_product_id_{{$product->product_id}}">
                            <input type="hidden" id="wishlish_product_name_{{$product->product_id}}"
                                   value="{{$product->product_name}}"
                                   class="cart_product_name_{{$product->product_id}}">
                            <input type="hidden" id="wishlish_product_image_{{$product->product_id}}"
                                   value="{{$product->product_image}}"
                                   class="cart_product_image_{{$product->product_id}}">
                            <input type="hidden" id="wishlish_product_price_{{$product->product_id}}"
                                   value="{{$product->product_price}}"
                                   class="cart_product_price_{{$product->product_id}}">
                            <input type="hidden" id="wishlish_product_quantity_{{$product->product_id}}"
                                   value="{{$product->product_quantity}}"
                                   class="cart_product_quantity_{{$product->product_id}}">
                            <input type="hidden" value="1" id="wishlish_product_qty_{{$product->product_id}}"
                                   class="cart_product_qty_{{$product->product_id}}">
                            <div class="single-popular-items mb-50 text-center">
                                <div class="popular-img">
                                    <img style="height: 380px;" src="/upload/product/{{ $product->product_image }}"
                                         alt="">
                                    @php
                                        $customerId = Session::get('customer_id');
                                    @endphp
                                    @if ($customerId)
                                        <div class="img-cap ">
                                            <button type="button" name="add-to-cart"
                                                    data-id_product="{{$product->product_id}}"
                                                    class="add-to-cart ">Thêm giỏ hàng
                                            </button>
                                        </div>
                                    @else
                                        <div class="img-cap ">
                                            <a href="{{URL::to('/login-checkout')}}"
                                               class="add-to-cart"><span>Thêm
                                            giỏ hàng</span></a>
                                        </div>
                                    @endif
                                    <input type="hidden" id="customerId" value="{{$customerId}}">

                                    <div class="favorit-items">
                                        @if ($customerId)
                                            <span id="{{$product->product_id}}" onclick="add_wistlist(this.id);"
                                                  class="flaticon-heart"></span>

                                        @else
                                            <a href="{{URL::to('/login-checkout')}}"
                                               class="add-to-cart"><span class="flaticon-heart"></span></a>
                                        @endif
                                    </div>
                                </div>
                                <div class="popular-caption">
                                    <h3>
                                        <a id="wishlish_product_url_{{$product->product_id}}"
                                           href="{{ route('detailProduct',['id'=>$product->product_id]) }}">{{$product->product_name}}</a>
                                    </h3>
                                    <span>{{number_format($product->product_price)}} đ</span>
                                </div>
                            </div>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    </div>>
    <div class="video-area">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="video-wrap">
                        <div class="play-btn "><a class="popup-video" href="https://www.youtube.com/watch?v=wusYkvUFmiI"><i class="fas fa-play"></i></a></div>
                    </div>
                </div>
            </div>
            <!-- Arrow -->
            <div class="thumb-content-box">
                <div class="thumb-content">
                    <h3>Xem chi tiết</h3>
                    <a href="https://www.youtube.com/watch?v=wusYkvUFmiI"> <i class="flaticon-arrow"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div style="padding-top: 100px; padding-bottom: 100px;" class="watch-area section-padding30">
        <div class="container">
            <div class="row align-items-center justify-content-between padding-130">
                <div class="col-lg-5 col-md-6">
                    <div class="watch-details mb-40">
                        <h2>{{$productLimit->product_name}}</h2>
                        <p>{{$productLimit->product_content}}</p>
                        <a href="{{ route('detailProduct',['id'=>$productLimit->product_id]) }}" class="btn">Xem đồng
                            hồ</a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-10">
                    <div class="choice-watch-img mb-40">
                        <img src="/upload/product/{{ $productLimit->product_image }}" alt="">
                    </div>
                </div>
            </div>
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-6 col-md-6 col-sm-10">
                    <div class="choice-watch-img mb-40">
                        <img src="/upload/product/{{ $productView->product_image }}" alt="">
                    </div>
                </div>
                <div class="col-lg-5 col-md-6">
                    <div class="watch-details mb-40">
                        <h2>{{$productView->product_name}}</h2>
                        <p>{{$productView->content}}</p>
                        <a href="{{ route('detailProduct',['id'=>$productView->product_id]) }}" class="btn">Xem đồng
                            hồ</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--  New Product End -->
    <!--? Popular Items Start -->
    <div class="popular-items section-paddingt2">
        <div class="container">
            <!-- Section tittle -->
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-8 col-md-10">
                    <div class="section-tittle mb-70 text-center">
                        <h2>Danh sách sản phẩm</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($products as $product)
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                        <form>
                            @csrf
                            <input type="hidden" id="wishlish_product_id_{{$product->product_id}}"
                                   value="{{$product->product_id}}"
                                   class="cart_product_id_{{$product->product_id}}">
                            <input type="hidden" id="wishlish_product_name_{{$product->product_id}}"
                                   value="{{$product->product_name}}"
                                   class="cart_product_name_{{$product->product_id}}">
                            <input type="hidden" id="wishlish_product_image_{{$product->product_id}}"
                                   value="{{$product->product_image}}"
                                   class="cart_product_image_{{$product->product_id}}">
                            <input type="hidden" id="wishlish_product_price_{{$product->product_id}}"
                                   value="{{$product->product_price}}"
                                   class="cart_product_price_{{$product->product_id}}">
                            <input type="hidden" id="wishlish_product_quantity_{{$product->product_id}}"
                                   value="{{$product->product_quantity}}"
                                   class="cart_product_quantity_{{$product->product_id}}">
                            <input type="hidden" value="1" id="wishlish_product_qty_{{$product->product_id}}"
                                   class="cart_product_qty_{{$product->product_id}}">
                            <div class="single-popular-items mb-50 text-center">
                                <div class="popular-img">
                                    <img style="height: 380px;" src="/upload/product/{{ $product->product_image }}"
                                         alt="">
                                    @php
                                        $customerId = Session::get('customer_id');
                                    @endphp
                                    @if ($customerId)
                                        <div class="img-cap ">
                                            <button type="button" name="add-to-cart"
                                                    data-id_product="{{$product->product_id}}"
                                                    class="add-to-cart ">Thêm giỏ hàng
                                            </button>
                                        </div>
                                    @else
                                        <div class="img-cap ">
                                            <a href="{{URL::to('/login-checkout')}}"
                                               class="add-to-cart"><span>Thêm
                                            giỏ hàng</span></a>
                                        </div>
                                    @endif
                                    <input type="hidden" id="customerId" value="{{$customerId}}">

                                    <div class="favorit-items">
                                        @if ($customerId)
                                            <span id="{{$product->product_id}}" onclick="add_wistlist(this.id);"
                                                  class="flaticon-heart"></span>

                                        @else
                                            <a href="{{URL::to('/login-checkout')}}"
                                               class="add-to-cart"><span class="flaticon-heart"></span></a>
                                        @endif
                                    </div>
                                </div>
                                <div class="popular-caption">
                                    <h3>
                                        <a id="wishlish_product_url_{{$product->product_id}}"
                                           href="{{ route('detailProduct',['id'=>$product->product_id]) }}">{{$product->product_name}}</a>
                                    </h3>
                                    <span>{{number_format($product->product_price)}} đ</span>
                                </div>
                            </div>
                        </form>
                    </div>
                @endforeach
            </div>
            <!-- Button -->
            <div class="row justify-content-center">
                <div class="room-btn pt-70">
                    <a href="{{route('shop')}}" class="btn view-btn1">Xem thêm sản phẩm</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Popular Items End -->
    <!--? Shop Method Start-->
    <div class="shop-method-area">
        <div class="container">
            <div class="method-wrapper">
                <div class="row d-flex justify-content-between">
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="single-method mb-40">
                            <i class="ti-package"></i>
                            <h6>Phương thức vận chuyển miễn phí</h6>
                            <p>Giao hàng nhanh, đóng gói cẩn thận, miễn phí đến tay người dùng</p>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="single-method mb-40">
                            <i class="ti-unlock"></i>
                            <h6>Hệ thống thanh toán an toàn</h6>
                            <p>Kiểm tra hàng mới thanh toán hoặc có thể thanh toán online nhanh chóng</p>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="single-method mb-40">
                            <i class="ti-reload"></i>
                            <h6>Bảo mật thông tin người dùng</h6>
                            <p>Thông tin khách hàng luôn được bảo mật</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <script type="text/javascript">
        $(document).ready(function () {
            $('.add-to-cart').click(function () {
                debugger;
                var id = $(this).data('id_product');
                var cart_product_id = $('.cart_product_id_' + id).val();
                var cart_product_name = $('.cart_product_name_' + id).val();
                var cart_product_image = $('.cart_product_image_' + id).val();
                var cart_product_price = $('.cart_product_price_' + id).val();
                var cart_product_quantity = $('.cart_product_quantity_' + id).val();
                var cart_product_qty = $('.cart_product_qty_' + id).val();
                var _token = $('input[name="_token"]').val();
                if (cart_product_qty >= cart_product_quantity) {
                    swal('error', 'Số lượng đặt lớn hơn số lượng còn trong kho, Vui lòng chọn số lượng nhỏ hơn', +cart_product_quantity);
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

        function add_wistlist(clicked_id) {
            debugger;
            var id = clicked_id;
            var name = $("#wishlish_product_name_" + id).val();
            var price = $("#wishlish_product_price_" + id).val();
            var image = $("#wishlish_product_image_" + id).val();
            var url = $("#wishlish_product_url_" + id).attr("href");
            var customerId = $("#customerId").val();
            var newItem = {
                'url': url,
                'id': id,
                'image': image,
                'price': price,
                'name': name,
                'customerId': customerId
            }
            if (localStorage.getItem('data') == null) {
                localStorage.setItem('data', '[]');
            }
            var old_data = JSON.parse(localStorage.getItem('data'));
            var matches = $.grep(old_data, function (obj) {
                return obj.id == id && obj.customerId == customerId;
            })
            if (matches.length) {
                toastr["warning"]('Sản phẩm bạn đã yêu thích, nên không thể thêm');
            } else {
                old_data.push(newItem);
                toastr["success"]('Sản phẩm đã được thêm vào danh sách yêu thích');
            }
            localStorage.setItem('data', JSON.stringify(old_data));
        }
    </script>

@endsection
