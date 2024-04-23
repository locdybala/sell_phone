@extends('layout')
@section('content')
    @php
        $customerId = Session::get('customer_id');
    @endphp
    <!-- Hero Area Start-->
    <div class="slider-area ">
        <div class="single-slider slider-height2 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>Chi tiết sản phẩm</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Area End-->
    <!--================Single Product Area =================-->
    <div class="product_image_area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="product_img_slide owl-carousel">
                        @foreach($gallery as $gallery)
                        <div class="single_product_img">
                            <img src="{{asset('upload/gallery/'.$gallery->gallery_name)}}" alt="#" class="img-fluid">
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="">
                        <h4>{{$productDetail->product_name}}</h4>
                        <p>
                            Mã ID: {{$productDetail->product_id}}
                        </p>
                        <div class="card_area">
                            <form action="">
                                @csrf
                                <input type="hidden" value="{{$productDetail->product_id}}"
                                       class="cart_product_id_{{$productDetail->product_id}}">
                                <input type="hidden" value="{{$productDetail->product_name}}"
                                       class="cart_product_name_{{$productDetail->product_id}}">
                                <input type="hidden" value="{{$productDetail->product_image}}"
                                       class="cart_product_image_{{$productDetail->product_id}}">
                                <input type="hidden" value="{{$productDetail->product_price}}"
                                       class="cart_product_price_{{$productDetail->product_id}}">
                                <input type="hidden" value="{{$productDetail->product_quantity}}"
                                       class="cart_product_quantity_{{$productDetail->product_id}}">
                                <p><b>Giá:</b> <span>{{number_format($productDetail->product_price,0,',','.').'VNĐ'}}</span></p>
                            <div class="product_count_area" style="justify-content: left !important;">
                                <p>Số lượng</p>
                                <div class="product_count d-inline-block">
                                    <span class="product_count_item inumber-decrement"> <i class="ti-minus"></i></span>
                                    <input class="product_count_item input-number cart_product_qty_{{$productDetail->product_id}}"
                                           type="text" value="1" min="0" max="10">
                                    <span class="product_count_item number-increment"> <i class="ti-plus"></i></span>
                                    <input name="productid_hidden" type="hidden"
                                           value="{{$productDetail->product_id}}"/>
                                </div>
                            </div>
                                <p><b>Tình trạng:</b> Còn hàng</p>
                                <p><b>Danh mục:</b> {{$productDetail->category->category_name}}</p>
                                <p><b>Thương hiệu:</b> {{$productDetail->brand->brand_name}}</p>
                                <a href=""><img src="{{asset('frontend/images/product-details/share.png')}}" class="share img-responsive" alt=""/></a>
                                <style>
                                    a.tags_style {
                                        margin: 3px 2px;
                                        border: 1px solid;
                                        height: auto;
                                        background: #428bca;
                                        color: #ffffff;
                                        padding: 0px;
                                    }

                                    a.tags_style:hover {
                                        background: black;
                                    }
                                </style>
                                <fieldset>
                                    <legend>Tags</legend>
                                    <p><i class="fa fa-tag"></i>
                                        @php
                                            $tag = $productDetail->product_tags;
                                            $tag = explode(",",$tag);
                                        @endphp
                                        @foreach($tag as $tag)
                                            <a href="#" class="tags_style">{{$tag}}</a>
                                        @endforeach
                                    </p>
                                </fieldset>
                            <div class="add_to_cart">
                                @php
                                    $customerId = Session::get('customer_id');
                                @endphp
                                @if ($customerId)
                                    <input type="button" value="Thêm giỏ hàng" class="genric-btn danger add-to-cart"
                                           data-id_product="{{$productDetail->product_id}}" name="add-to-cart">
                                @else
                                    <a href="{{URL::to('/login-checkout')}}"
                                       class="genric-btn danger add-to-cart">Thêm
                                        giỏ hàng</a>
                                @endif
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="details-tab" data-toggle="tab" href="#details" role="tab" aria-controls="details" aria-selected="true">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="companyprofile-tab" data-toggle="tab" href="#companyprofile" role="tab" aria-controls="companyprofile" aria-selected="false">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Contact</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="details" role="tabpanel" aria-labelledby="details-tab">
                            <div class="col-sm-12">
                                <p>{!! $productDetail->product_content!!}</p>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="companyprofile" role="tabpanel" aria-labelledby="companyprofile-tab">
                            <div class="col-sm-12">
                                <p>{!! $productDetail->product_desc!!}</p>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                            <div class="col-sm-12">
                                <ul>
                                    <li><a href=""><i class="fa fa-user"></i>ADMIN</a></li>
                                    <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
                                    <li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
                                </ul>
                                <form>
                                    @csrf
                                    <input type="text" id="comment_product_id" name="comment_product_id"
                                           value="{{$productDetail->product_id}}"
                                           hidden>
                                    <div id="comment_show">

                                        {{--                                <div style="border: 1px solid #ddd; border-radius: 10px; background-color: #F0F0E9"--}}
                                        {{--                                     class="row style_comment">--}}
                                        {{--                                    <input type="text" name="comment_product_id" value="{{$productDetail->product_id}}"--}}
                                        {{--                                           hidden>--}}
                                        {{--                                    <div class="col-md-2">--}}
                                        {{--                                        <img width="80%" style="border-radius: 50%"--}}
                                        {{--                                             src="{{asset('frontend/images/man.png')}}"--}}
                                        {{--                                             class="img img-responsive img-thumbnail" alt="">--}}
                                        {{--                                    </div>--}}
                                        {{--                                    <div style="margin-top: 10px;" class="mt-2 col-md-10">--}}
                                        {{--                                        <span><strong style="color: #1ddf61;">@Đình Lộc</strong></span>--}}
                                        {{--                                        <p>qưe</p>--}}
                                        {{--                                    </div>--}}

                                        {{--                                </div>--}}
                                    </div>
                                </form>
                                <p><b>Viết đánh giá của bạn</b></p>

                                <form action="#">
										<span>
											<input style="width: 100%; margin-left: 0" id="comment_name" type="text"
                                                   placeholder="Tên bình luận"/>
										</span>
                                    <textarea name="comment" placeholder="Nội dung commnet" id="comment_content"></textarea>
                                    <div id="notifi_comments"></div>
                                    <button type="button" class="btn btn-default pull-right send-comment">Đánh giá
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--================End Single Product Area =================-->
    <div class="popular-items section-padding30">
        <div class="container">
            <!-- Section tittle -->
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-8 col-md-10">
                    <div class="section-tittle mb-70 text-center">
                        <h2>Sản phẩm gợi ý</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($related_products as $product)
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
        </div>
    </div>
@endsection
@section('javascript')

    <script type="text/javascript">
        $(document).ready(function () {
            loadComments();

            function loadComments() {
                var product_id = $('#comment_product_id').val();
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{ url('/load-comments')}}",
                    method: "POST",
                    data: {product_id: product_id, _token: _token},
                    success: function (data) {
                        $('#comment_show').html(data);
                    }
                })
            }

            $('.send-comment').click(function () {
                var product_id = $('#comment_product_id').val();
                var comment_name = $('#comment_name').val();
                var comment_content = $('#comment_content').val();
                var _token = $('input[name="_token"]').val();

                $.ajax({
                    url: "{{ url('/send-comments')}}",
                    method: "POST",
                    data: {
                        product_id: product_id,
                        _token: _token,
                        comment_name: comment_name,
                        comment_content: comment_content
                    },
                    success: function (data) {
                        $('#notifi_comments').html('<span class="text text-success">Thêm bình luận thành công, bình luận đang được ch duyệt</span>');
                        loadComments();
                        $('#notifi_comments').fadeOut('slow');
                        $('#comment_name').val('');
                        $('#comment_content').val(' ');
                    }
                })
            })
        });
    </script>

@endsection
@section('javascript')
    <script type="text/javascript">
        $('.number-increment').click(function (){
            alert(1);
        })
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
