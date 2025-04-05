@extends('layout')
@section('content')

    @if(isset($sliders) && count($sliders) > 0)
        <section class="banner_part">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <div class="banner_slider owl-carousel">
                            @foreach($sliders as $slider)
                                <div class="single_banner_slider">
                                    <div class="row">
                                        <div class="col-lg-5 col-md-8">
                                            <div class="banner_text">
                                                <div class="banner_text_iner">
                                                    <h1>{{ $slider->slider_name }}</h1>
                                                    <p>{!! $slider->slider_desc !!} </p>
                                                    <a href="{{route('shop')}}" class="btn_2">Mua ngay</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="banner_img d-none d-lg-block">
                                            <img src="{{ asset('upload/slider/'. $slider->slider_image) }}"
                                                 alt="{{ $slider->title }}">
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="slider-counter"></div>
                    </div>
                </div>
            </div>
        </section>
    @endif


    <!-- feature_part start-->
    <section class="feature_part padding_top">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section_tittle text-center">
                        <h2>Danh mục nổi bật</h2>
                    </div>
                </div>
            </div>
            <div class="row align-items-center justify-content-between">
                @php
                    $default_images = [
                        'frontend/img/feature/feature_1.png',
                        'frontend/img/feature/feature_2.png',
                        'frontend/img/feature/feature_3.png',
                        'frontend/img/feature/feature_4.png'
                    ];
                @endphp
                @foreach($categories as $key => $ca)
                    <div class="col-lg-6 col-sm-6">
                        <div class="single_feature_post_text">
                            <p>Chất lượng cao</p>
                            <h3>{{ $ca->category_name }}</h3>
                            <a href="{{ route('detailCategory',['id'=>$ca->category_id]) }}" class="feature_btn">XEM
                                NGAY <i class="fas fa-play"></i></a>
                            <img src="{{ asset($default_images[$key]) }}" alt="{{ $ca->category_name }}">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- upcoming_event part start-->

    <!-- product_list start-->
    <section class="product_list section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="section_tittle text-center">
                        <h2>Danh sách <span>Sản phẩm</span></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    @foreach ($products->chunk(8) as $chunk)
                        <!-- Mỗi slide chứa 8 sản phẩm -->
                        <div class="single_product_list_slider">
                            <div class="row align-items-center justify-content-between">
                                @foreach ($chunk as $product)
                                    <div class="col-lg-3 col-sm-6">
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
                                            <input type="hidden" value="1"
                                                   class="cart_product_qty_{{$product->product_id}}">
                                            <div class="single_product_item">
                                                <a href="{{ route('detailProduct',['id'=>$product->product_id]) }}">
                                                    <img src="/upload/product/{{ $product->product_image }}" alt=""></a>
                                                <div class="single_product_text">

                                                    <h4>{{$product->product_name}}</h4>
                                                    <h3>{{number_format($product->product_price)}}</h3>
                                                    @php
                                                        $customerId = Session::get('customer_id');
                                                    @endphp
                                                    @if ($customerId)
                                                        <input type="button" name="add-to-cart" value="Thêm giỏ hàng"
                                                               data-id_product="{{$product->product_id}}"
                                                               class="add-to-cart btn_3">
                                                    @else
                                                        <a href="{{URL::to('/login-checkout')}}" class="add_cart">Thêm
                                                            giỏ hàng<i class="ti-heart"></i></a>
                                                    @endif
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- product_list part start-->

    <!-- awesome_shop start-->
    @if($coupon)
        <section class="our_offer section_padding">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-lg-6 col-md-6">
                        <div class="offer_img">
                            <img src="{{asset('frontend/img/offer_img.png')}}" alt="Khuyến mãi">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="offer_text">
                            <h2>Ưu đãi đặc biệt:
                                {{ $coupon->coupon_condition == 1 ? $coupon->coupon_number.'%' : number_format($coupon->coupon_number) . ' VND' }}
                                giảm giá</h2>
                            <p>Áp dụng với mã: <strong>{{ $coupon->coupon_code }}</strong></p>
                            <p>Thời gian khuyến mãi: {{ date('d/m/Y', strtotime($coupon->coupon_date_start)) }}
                                - {{ date('d/m/Y', strtotime($coupon->coupon_date_end)) }}</p>

                            <div class="input-group">
                                <input type="text" class="form-control" value="{{ $coupon->coupon_code }}" readonly>
                                <div class="input-group-append">
                                    <a href="#" class="input-group-text btn_2">Dùng ngay</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!-- awesome_shop part start-->

    <!-- product_list part start-->
    <section class="product_list best_seller section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="section_tittle text-center">
                        <h2>Sản phẩm <span>mới</span></h2>
                    </div>
                </div>
            </div>
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-12">
                    <div class="best_product_slider owl-carousel">
                        @foreach($bestSellers as $product)
                            <div class="single_product_item">
                                <a href="{{ route('detailProduct',['id'=>$product->product_id]) }}">
                                <img src="/upload/product/{{ $product->product_image }}" alt="">
                                <div class="single_product_text">
                                    <h4>{{$product->product_name}}</h4>
                                    <h3>{{number_format($product->product_price)}}</h3>
                                </div>
                                </a>
                            </div>
<<<<<<< HEAD
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- product_list part end-->

    <!-- subscribe_area part start-->
    <section class="subscribe_area section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="subscribe_area_text text-center">
                        <h5>Đừng bỏ lỡ cơ hội!</h5>
                        <h2>Khám phá những ưu đãi đặc biệt, Mua ngay để nhận thêm quà tặng hấp dẫn!</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--::subscribe_area part end::-->

    <!-- subscribe_area part start-->
    <section class="client_logo padding_top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="single_client_logo">
                        <img src="{{asset('frontend/img/client_logo/client_logo_1.png')}}" alt="">
                    </div>
                    <div class="single_client_logo">
                        <img src="{{asset('frontend/img/client_logo/client_logo_2.png')}}" alt="">
                    </div>
                    <div class="single_client_logo">
                        <img src="{{asset('frontend/img/client_logo/client_logo_3.png')}}" alt="">
                    </div>
                    <div class="single_client_logo">
                        <img src="{{asset('frontend/img/client_logo/client_logo_4.png')}}" alt="">
                    </div>
                    <div class="single_client_logo">
                        <img src="{{asset('frontend/img/client_logo/client_logo_5.png')}}" alt="">
                    </div>
                    <div class="single_client_logo">
                        <img src="{{asset('frontend/img/client_logo/client_logo_3.png')}}" alt="">
                    </div>
                    <div class="single_client_logo">
                        <img src="{{asset('frontend/img/client_logo/client_logo_1.png')}}" alt="">
                    </div>
                    <div class="single_client_logo">
                        <img src="{{asset('frontend/img/client_logo/client_logo_2.png')}}" alt="">
                    </div>
                    <div class="single_client_logo">
                        <img src="{{asset('frontend/img/client_logo/client_logo_3.png')}}" alt="">
                    </div>
                    <div class="single_client_logo">
                        <img src="{{asset('frontend/img/client_logo/client_logo_4.png')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--::subscribe_area part end::-->
=======
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Vesitable Shop End -->



    <!-- Bestsaler Product Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="text-center mx-auto mb-5" style="max-width: 700px;">
                <h1 class="display-4">Danh sách sản phẩm</h1>
                <p>Chúng tôi cung cấp các sản phẩm thân thiện với môi trường như túi đựng, ống hút và hộp đựng thực
                    phẩm, tất cả đều làm từ vật liệu tự nhiên, dễ phân hủy và an toàn cho sức khỏe. Hãy chọn sản phẩm
                    sinh học để bảo vệ hành tinh! 🌱✨</p>
            </div>
            <div class="row g-4">
                @foreach($products as $product)
                    <div class="col-lg-6 col-xl-4">
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
                            <div class="p-4 rounded bg-light">
                                <div class="row align-items-center">
                                    <div class="col-6">
                                        <img src="/upload/product/{{ $product->product_image }}"
                                             class="img-fluid rounded-circle w-100" alt="">
                                    </div>
                                    <div class="col-6">
                                        <a href="{{ route('detailProduct',['id'=>$product->product_id]) }}"
                                           class="h5 product-name">{{$product->product_name}}</a>
                                        <div class="d-flex my-3">
                                            <i class="fas fa-star text-primary"></i>
                                            <i class="fas fa-star text-primary"></i>
                                            <i class="fas fa-star text-primary"></i>
                                            <i class="fas fa-star text-primary"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <h4 class="mb-3">{{number_format($product->product_price)}} <u>đ</u></h4>
                                        @php
                                            $customerId = Session::get('customer_id');
                                        @endphp
                                        @if ($customerId)
                                            <button type="button" name="add-to-cart"
                                                    data-id_product="{{$product->product_id}}"
                                                    class=" add-to-cartbtn border border-secondary rounded-pill px-3 text-primary">
                                                <i
                                                    class="fa fa-shopping-bag me-2 text-primary"></i> Đặt hàng
                                            </button>
                                        @else
                                            <a href="{{URL::to('/login-checkout')}}"
                                               class="add-to-cart btn border border-secondary rounded-pill px-3 text-primary"><i
                                                    class="fa fa-shopping-bag me-2 text-primary"></i> Đặt hàng</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Bestsaler Product End -->

>>>>>>> 89ff803 (add code thanh toan)
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
                    toastr["error"]('Số lượng đặt lớn hơn số lượng còn trong kho, Vui lòng chọn số lượng nhỏ hơn', +cart_product_quantity);
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
                            Swal.fire({
                                title: "Đã thêm sản phẩm vào giỏ hàng",
                                text: "Bạn có thể mua hàng tiếp hoặc tới giỏ hàng để tiến hành thanh toán",
                                icon: "success",
                                showCancelButton: true,
                                confirmButtonText: "Đi đến giỏ hàng",
                                cancelButtonText: "Xem tiếp",
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
