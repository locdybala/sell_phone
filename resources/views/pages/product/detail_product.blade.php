@extends('layout')
@section('content')
    @php
        $customerId = Session::get('customer_id');
    @endphp
        <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Chi tiết sản phẩm</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="#">{{$productDetail->category->category_name}}</a></li>
            <li class="breadcrumb-item active text-white">{{$productDetail->product_name}}</li>
        </ol>
    </div>
    <!-- Single Page Header End -->


    <!-- Single Product Start -->
    <div class="container-fluid py-5 mt-5">
        <div class="container py-5">
            <div class="row g-4 mb-5">
                <div class="col-lg-12 col-xl-12">
                    <div class="row g-4">
                        <div class="col-lg-5">
                            <div class="product_img_slide owl-carousel">
                                <div id="carouselId" class="carousel slide position-relative" data-bs-ride="carousel">
                                    <div class="carousel-inner" role="listbox">
                                        @foreach($gallery as $gallery)
                                            <div class="carousel-item {{ $loop->first ? 'active' : '' }} rounded">
                                                <img src="{{asset('upload/gallery/'.$gallery->gallery_name)}}"
                                                     class="img-fluid w-100 h-100 bg-secondary rounded"
                                                     alt="Slide {{ $loop->index + 1 }}">
                                            </div>
                                        @endforeach
                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselId"
                                            data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselId"
                                            data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-7">
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
                                <h4 class="fw-bold mb-3">{{$productDetail->product_name}}</h4>
                                <p class="mb-3 fw-bold">Mã ID: {{$productDetail->product_id}}</p>
                                <p class="mb-3 fw-bold">Danh mục: {{$productDetail->category->category_name}}</p>
                                <p class="mb-3 fw-bold">Số lượt xem: {{$productDetail->product_view}}</p>
                                <h5 class="fw-bold mb-3"><b>Giá:</b>
                                    <span>{{number_format($productDetail->product_price,0,',','.').'đ'}}</span></h5>
                                <div class="d-flex mb-4">
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <p class="mb-4">{!! $productDetail->product_content !!}</p>
                                <style>
                                    a.tags_style {
                                        margin: 3px 2px;
                                        border: 1px solid;
                                        height: auto;
                                        background: #ff3b3b;
                                        color: #ffffff;
                                        padding: 0px;
                                    }

                                    a.tags_style:hover {
                                        background: black;
                                    }
                                </style>
                                <fieldset>
                                    <legend>Tags:</legend>
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
                                <div class="input-group quantity mb-5" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-minus rounded-circle bg-light border">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text" class="form-control form-control-sm text-center border-0 cart_product_qty_{{$productDetail->product_id}}"
                                           value="1">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-plus rounded-circle bg-light border">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                @php
                                    $customerId = Session::get('customer_id');
                                @endphp
                                @if ($customerId)
                                    <i class="fa fa-shopping-bag me-2 text-primary"></i><input type="button" value="Đặt ngay" class="add-to-cart btn border border-secondary rounded-pill px-4 py-2 mb-4 text-primary"
                                           data-id_product="{{$productDetail->product_id}}" name="add-to-cart">
                                @else
                                    <a href="{{URL::to('/login-checkout')}}"
                                       class="btn border border-secondary rounded-pill px-4 py-2 mb-4 text-primary"><i
                                            class="fa fa-shopping-bag me-2 text-primary"></i> Đặt ngay</a>
                                @endif

                            </form>
                        </div>
                        <div class="col-lg-12">
                            <nav>
                                <div class="nav nav-tabs mb-3">
                                    <button class="nav-link active border-white border-bottom-0" type="button"
                                            role="tab"
                                            id="nav-about-tab" data-bs-toggle="tab" data-bs-target="#nav-about"
                                            aria-controls="nav-about" aria-selected="true">Mô tả sản phẩm
                                    </button>
                                    <button class="nav-link border-white border-bottom-0" type="button" role="tab"
                                            id="nav-mission-tab" data-bs-toggle="tab" data-bs-target="#nav-mission"
                                            aria-controls="nav-mission" aria-selected="false">Đánh giá
                                    </button>
                                </div>
                            </nav>
                            <div class="tab-content mb-5">
                                <div class="tab-pane active" id="nav-about" role="tabpanel"
                                     aria-labelledby="nav-about-tab">
                                    <p>{!! $productDetail->product_desc!!}</p>
                                </div>
                                <div class="tab-pane" id="nav-mission" role="tabpanel"
                                     aria-labelledby="nav-mission-tab">
                                    <input type="text" id="comment_product_id" name="comment_product_id"
                                           value="{{$productDetail->product_id}}"
                                           hidden>
                                    <div id="comment_show">


                                    </div>
                                </div>
                            </div>
                        </div>
                        <form class="form-contact comment_form" action="#" id="commentForm">
                        <h4 class="mb-5 fw-bold">Viết đánh giá</h4>
                            <div class="row g-4">
                                <div class="col-lg-6">
                                    <div class="border-bottom rounded">
                                        <input type="text" name="comment_name" id="comment_name" class="form-control border-0 me-4" placeholder="Họ và tên *">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="border-bottom rounded">
                                        <input type="email" class="form-control border-0" placeholder="Địa chỉ Email *">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="border-bottom rounded my-4">
                                        <textarea name="comment" id="comment_content" class="form-control border-0" cols="30" rows="8"
                                                  placeholder="Your Review *" spellcheck="false"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="d-flex justify-content-between py-3 mb-5">
                                        <div class="d-flex align-items-center">
                                            <p class="mb-0 me-3">Please rate:</p>
                                            <div class="d-flex align-items-center" style="font-size: 12px;">
                                                <i class="fa fa-star text-muted"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                        <a href="#"
                                           class="btn border border-secondary text-primary rounded-pill px-4 py-3"> Nhận xét</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <h1 class="fw-bold mb-0">Sản phẩm gợi ý</h1>
            <div class="vesitable">
                <div class="owl-carousel vegetable-carousel justify-content-center">
                    @foreach($related_products as $product)
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
                            <div class="border border-primary rounded position-relative vesitable-item">
                                <div class="vesitable-img">
                                    <img src="/upload/product/{{ $product->product_image }}"
                                         class="img-fluid w-100 rounded-top" alt="">
                                </div>
                                <div class="text-white bg-primary px-3 py-1 rounded position-absolute"
                                     style="top: 10px; right: 10px;">Vegetable
                                </div>
                                <div class="p-4 pb-0 rounded-bottom">
                                    <a href="{{ route('detailProduct',['id'=>$product->product_id]) }}">
                                        <h4>{{$product->product_name}}</h4></a>
                                    <div class="d-flex justify-content-between flex-lg-wrap">
                                        <p class="text-dark fs-5 fw-bold">{{number_format($product->product_price)}}
                                            đ</p>
                                        @php
                                            $customerId = Session::get('customer_id');
                                        @endphp
                                        @if ($customerId)
                                            <button type="button" name="add-to-cart"
                                                    data-id_product="{{$product->product_id}}"
                                                    class="btn border border-secondary rounded-pill px-3 py-1 mb-4 text-primary add-to-cart ">
                                                <i class="fa fa-shopping-bag me-2 text-primary"></i>Thêm giỏ hàng
                                            </button>
                                        @else
                                            <a href="{{URL::to('/login-checkout')}}"
                                               class="btn border border-secondary rounded-pill px-3 py-1 mb-4 text-primary add-to-cart"><i
                                                    class="fa fa-shopping-bag me-2 text-primary"></i>Thêm
                                                giỏ hàng</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </form>
                    @endforeach
                </div>
            </div>
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
                        $('#notifi_comments').html('<span class="text text-success">Thêm bình luận thành công, bình luận đang được chờ duyệt</span>');
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
        $('.number-increment').click(function () {
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
