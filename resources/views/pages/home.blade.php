@extends('layout')
@section('content')
    <!--? slider Area Start -->
    <div class="slider-area ">
        <div class="slider-active">
            <!-- Single Slider -->
            <div class="single-slider slider-height d-flex align-items-center slide-bg">
                <div class="container">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8">
                            <div class="hero__caption">
                                <h1 data-animation="fadeInLeft" data-delay=".4s" data-duration="2000ms">{{$slider->slider_name}}</h1>
                                <p data-animation="fadeInLeft" data-delay=".7s" data-duration="2000ms">{!! $slider->slider_desc !!}</p>
                                <!-- Hero-btn -->
                                <div class="hero__btn" data-animation="fadeInLeft" data-delay=".8s"
                                     data-duration="2000ms">
                                    <a href="{{route('shop')}}" class="btn hero-btn">Xem thêm</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4 d-none d-sm-block">
                            <div class="hero__img" data-animation="bounceIn" data-delay=".4s">
                                <img src="{{asset('frontend/assets/img/hero/watch.png')}}" alt="" class=" heartbeat">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Single Slider -->
            {{--            <div class="single-slider slider-height d-flex align-items-center slide-bg">--}}
            {{--                <div class="container">--}}
            {{--                    <div class="row justify-content-between align-items-center">--}}
            {{--                        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8">--}}
            {{--                            <div class="hero__caption">--}}
            {{--                                <h1 data-animation="fadeInLeft" data-delay=".4s" data-duration="2000ms">Select Your New Perfect Style</h1>--}}
            {{--                                <p data-animation="fadeInLeft" data-delay=".7s" data-duration="2000ms">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat is aute irure.</p>--}}
            {{--                                <!-- Hero-btn -->--}}
            {{--                                <div class="hero__btn" data-animation="fadeInLeft" data-delay=".8s" data-duration="2000ms">--}}
            {{--                                    <a href="industries.html" class="btn hero-btn">Shop Now</a>--}}
            {{--                                </div>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4 d-none d-sm-block">--}}
            {{--                            <div class="hero__img" data-animation="bounceIn" data-delay=".4s">--}}
            {{--                                <img src="{{asset('frontend/assets/img/hero/watch.png')}}" alt="" class=" heartbeat">--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            </div>--}}
        </div>
    </div>
    <!-- slider Area End-->
    <!-- ? New Product Start -->
    <section class="new-product-area section-padding30">
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
    <!--  New Product End -->
    <!--? Gallery Area Start -->
    <div class="gallery-area">
        <div class="container-fluid p-0 fix">
            <div class="row">
                <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6">
                    <div class="single-gallery mb-30">
                        <div class="gallery-img big-img"
                             style="background-image: url(frontend/assets/img/gallery/gallery1.png);"></div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                    <div class="single-gallery mb-30">
                        <div class="gallery-img big-img"
                             style="background-image: url(frontend/assets/img/gallery/gallery2.png);"></div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-12">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-6 col-sm-6">
                            <div class="single-gallery mb-30">
                                <div class="gallery-img small-img"
                                     style="background-image: url(frontend/assets/img/gallery/gallery3.png);"></div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12  col-md-6 col-sm-6">
                            <div class="single-gallery mb-30">
                                <div class="gallery-img small-img"
                                     style="background-image: url(frontend/assets/img/gallery/gallery4.png);"></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Gallery Area End -->
    <!--? Popular Items Start -->
    <div class="popular-items section-padding30">
        <div class="container">
            <!-- Section tittle -->
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-8 col-md-10">
                    <div class="section-tittle mb-70 text-center">
                        <h2>Danh sách sản phẩm</h2>
                        <p>Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                            aliqua. Quis ipsum suspendisse ultrices gravida.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($products as $product)
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                        <form>
                            @csrf
                            <input type="hidden" value="{{$product->product_id}}"
                                   class="cart_product_id_{{$product->product_id}}">
                            <input type="hidden" value="{{$product->product_name}}"
                                   class="cart_product_name_{{$product->product_id}}">
                            <input type="hidden" value="{{$product->product_image}}"
                                   class="cart_product_image_{{$product->product_id}}">
                            <input type="hidden" value="{{$product->product_price}}"
                                   class="cart_product_price_{{$product->product_id}}">
                            <input type="hidden" value="{{$product->product_quantity}}"
                                   class="cart_product_quantity_{{$product->product_id}}">
                            <input type="hidden" value="1" class="cart_product_qty_{{$product->product_id}}">
                            <div class="single-popular-items mb-50 text-center">
                                <div class="popular-img">
                                    <img style="height: 380px;" src="/upload/product/{{ $product->product_image }}" alt="">
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
                                    <div class="favorit-items">
                                        <span class="flaticon-heart"></span>
                                    </div>
                                </div>
                                <div class="popular-caption">
                                    <h3>
                                        <a href="{{ route('detailProduct',['id'=>$product->product_id]) }}">{{$product->product_name}}</a>
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
                    <a href="catagori.html" class="btn view-btn1">Xem thêm sản phẩm</a>
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
    </script>

@endsection
