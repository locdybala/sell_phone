@extends('layout')
@section('content')
    @php
        $customerId = Session::get('customer_id');
    @endphp
        <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Chi tiết sản phẩm</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Pages</a></li>
            <li class="breadcrumb-item active text-white">Shop Detail</li>
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
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-7">
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
                            <p class="mb-4">The generated Lorem Ipsum is therefore always free from repetition injected humour, or non-characteristic words etc.</p>
                            <p class="mb-4">Susp endisse ultricies nisi vel quam suscipit. Sabertooth peacock flounder; chain pickerel hatchetfish, pencilfish snailfish</p>
                            <div class="input-group quantity mb-5" style="width: 100px;">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-minus rounded-circle bg-light border" >
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <input type="text" class="form-control form-control-sm text-center border-0" value="1">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-plus rounded-circle bg-light border">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <a href="#" class="btn border border-secondary rounded-pill px-4 py-2 mb-4 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                        </div>
                        <div class="col-lg-12">
                            <nav>
                                <div class="nav nav-tabs mb-3">
                                    <button class="nav-link active border-white border-bottom-0" type="button" role="tab"
                                            id="nav-about-tab" data-bs-toggle="tab" data-bs-target="#nav-about"
                                            aria-controls="nav-about" aria-selected="true">Description</button>
                                    <button class="nav-link border-white border-bottom-0" type="button" role="tab"
                                            id="nav-mission-tab" data-bs-toggle="tab" data-bs-target="#nav-mission"
                                            aria-controls="nav-mission" aria-selected="false">Reviews</button>
                                </div>
                            </nav>
                            <div class="tab-content mb-5">
                                <div class="tab-pane active" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                                    <p>The generated Lorem Ipsum is therefore always free from repetition injected humour, or non-characteristic words etc.
                                        Susp endisse ultricies nisi vel quam suscipit </p>
                                    <p>Sabertooth peacock flounder; chain pickerel hatchetfish, pencilfish snailfish filefish Antarctic
                                        icefish goldeye aholehole trumpetfish pilot fish airbreathing catfish, electric ray sweeper.</p>
                                    <div class="px-2">
                                        <div class="row g-4">
                                            <div class="col-6">
                                                <div class="row bg-light align-items-center text-center justify-content-center py-2">
                                                    <div class="col-6">
                                                        <p class="mb-0">Weight</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <p class="mb-0">1 kg</p>
                                                    </div>
                                                </div>
                                                <div class="row text-center align-items-center justify-content-center py-2">
                                                    <div class="col-6">
                                                        <p class="mb-0">Country of Origin</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <p class="mb-0">Agro Farm</p>
                                                    </div>
                                                </div>
                                                <div class="row bg-light text-center align-items-center justify-content-center py-2">
                                                    <div class="col-6">
                                                        <p class="mb-0">Quality</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <p class="mb-0">Organic</p>
                                                    </div>
                                                </div>
                                                <div class="row text-center align-items-center justify-content-center py-2">
                                                    <div class="col-6">
                                                        <p class="mb-0">Сheck</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <p class="mb-0">Healthy</p>
                                                    </div>
                                                </div>
                                                <div class="row bg-light text-center align-items-center justify-content-center py-2">
                                                    <div class="col-6">
                                                        <p class="mb-0">Min Weight</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <p class="mb-0">250 Kg</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="nav-mission" role="tabpanel" aria-labelledby="nav-mission-tab">
                                    <div class="d-flex">
                                        <img src="img/avatar.jpg" class="img-fluid rounded-circle p-3" style="width: 100px; height: 100px;" alt="">
                                        <div class="">
                                            <p class="mb-2" style="font-size: 14px;">April 12, 2024</p>
                                            <div class="d-flex justify-content-between">
                                                <h5>Jason Smith</h5>
                                                <div class="d-flex mb-3">
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                            <p>The generated Lorem Ipsum is therefore always free from repetition injected humour, or non-characteristic
                                                words etc. Susp endisse ultricies nisi vel quam suscipit </p>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <img src="img/avatar.jpg" class="img-fluid rounded-circle p-3" style="width: 100px; height: 100px;" alt="">
                                        <div class="">
                                            <p class="mb-2" style="font-size: 14px;">April 12, 2024</p>
                                            <div class="d-flex justify-content-between">
                                                <h5>Sam Peters</h5>
                                                <div class="d-flex mb-3">
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                            <p class="text-dark">The generated Lorem Ipsum is therefore always free from repetition injected humour, or non-characteristic
                                                words etc. Susp endisse ultricies nisi vel quam suscipit </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="nav-vision" role="tabpanel">
                                    <p class="text-dark">Tempor erat elitr rebum at clita. Diam dolor diam ipsum et tempor sit. Aliqu diam
                                        amet diam et eos labore. 3</p>
                                    <p class="mb-0">Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et eos labore.
                                        Clita erat ipsum et lorem et sit</p>
                                </div>
                            </div>
                        </div>
                        <form action="#">
                            <h4 class="mb-5 fw-bold">Leave a Reply</h4>
                            <div class="row g-4">
                                <div class="col-lg-6">
                                    <div class="border-bottom rounded">
                                        <input type="text" class="form-control border-0 me-4" placeholder="Yur Name *">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="border-bottom rounded">
                                        <input type="email" class="form-control border-0" placeholder="Your Email *">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="border-bottom rounded my-4">
                                        <textarea name="" id="" class="form-control border-0" cols="30" rows="8" placeholder="Your Review *" spellcheck="false"></textarea>
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
                                        <a href="#" class="btn border border-secondary text-primary rounded-pill px-4 py-3"> Post Comment</a>
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
                            <img  src="/upload/product/{{ $product->product_image }}" class="img-fluid w-100 rounded-top" alt="">
                        </div>
                        <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">Vegetable</div>
                        <div class="p-4 pb-0 rounded-bottom">
                            <a href="{{ route('detailProduct',['id'=>$product->product_id]) }}"><h4>{{$product->product_name}}</h4></a>
                            <div class="d-flex justify-content-between flex-lg-wrap">
                                <p class="text-dark fs-5 fw-bold">{{number_format($product->product_price)}} đ</p>
                                @php
                                    $customerId = Session::get('customer_id');
                                @endphp
                                @if ($customerId)
                                    <button type="button" name="add-to-cart"
                                            data-id_product="{{$product->product_id}}"
                                            class="btn border border-secondary rounded-pill px-3 py-1 mb-4 text-primary add-to-cart "><i class="fa fa-shopping-bag me-2 text-primary"></i>Thêm giỏ hàng
                                    </button>
                                @else
                                    <a href="{{URL::to('/login-checkout')}}"
                                       class="btn border border-secondary rounded-pill px-3 py-1 mb-4 text-primary add-to-cart"><i class="fa fa-shopping-bag me-2 text-primary"></i>Thêm
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
    <!-- Single Product End -->
        <!-- Hero Area Start-->
    <div class="slider-area ">
        <div style="min-height: 300px" class="single-slider slider-height2 d-flex align-items-center">
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

                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="">
                        <h4>{{$productDetail->product_name}}</h4>
                        <p>
                            Mã ID: {{$productDetail->product_id}}
                        </p>
                        <p>
                            Số lượt xem: {{$productDetail->product_view}}
                        </p>
                        <div style="margin-top: 10px" class="card_area">
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
                                <p><b>Giá:</b>
                                    <span>{{number_format($productDetail->product_price,0,',','.').'VNĐ'}}</span></p>
                                <div class="product_count_area" style="justify-content: left !important;">
                                    <p>Số lượng</p>
                                    <div class="product_count d-inline-block">
                                        <span class="product_count_item inumber-decrement"> <i
                                                class="ti-minus"></i></span>
                                        <input
                                            class="product_count_item input-number cart_product_qty_{{$productDetail->product_id}}"
                                            type="text" value="1" min="0" max="10">
                                        <span class="product_count_item number-increment"> <i
                                                class="ti-plus"></i></span>
                                        <input name="productid_hidden" type="hidden"
                                               value="{{$productDetail->product_id}}"/>
                                    </div>
                                </div>
                                <p><b>Tình trạng:</b> Còn hàng</p>
                                <p><b>Danh mục:</b> {{$productDetail->category->category_name}}</p>
                                <p><b>Thương hiệu:</b> {{$productDetail->brand->brand_name}}</p>
                                <a href=""><img src="{{asset('frontend/images/product-details/share.png')}}"
                                                class="share img-responsive" alt=""/></a>
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
    <section class="popular-items latest-padding">
        <div class="container">
            <div class="row product-btn justify-content-between mb-40">
                <div class="properties__button">
                    <!--Nav Button  -->
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link " id="nav-home-tab" data-toggle="tab" href="#details"
                               role="tab" aria-controls="details" aria-selected="true">Mô tả</a>
                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#companyprofile"
                               role="tab" aria-controls="companyprofile" aria-selected="false">Thông tin chi tiết</a>
                            <a class="nav-item nav-link active" id="nav-contact-tab" data-toggle="tab" href="#reviews"
                               role="tab" aria-controls="reviews" aria-selected="false"> Nhận xét </a>
                        </div>
                    </nav>
                    <!--End Nav Button  -->
                </div>
            </div>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade" id="details" role="tabpanel" aria-labelledby="details-tab">
                    <div class="col-sm-12">
                        <p>{!! $productDetail->product_content!!}</p>
                    </div>
                </div>
                <div class="tab-pane fade" id="companyprofile" role="tabpanel" aria-labelledby="companyprofile-tab">
                    <div class="col-sm-12">
                        <p>{!! $productDetail->product_desc!!}</p>
                    </div>
                </div>
                <div class="tab-pane fade show active" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                    <form>
                        @csrf
                    <div class="comments-area">
                        <h4>Nhận xét</h4>
                        <input type="text" id="comment_product_id" name="comment_product_id"
                               value="{{$productDetail->product_id}}"
                               hidden>
                        <div id="comment_show">

                        </div>


                    </div>
                    </form>
                    <div class="comment-form">
                        <h4>Viết đánh giá của bạn</h4>
                        <form class="form-contact comment_form" action="#" id="commentForm">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control" name="comment_name" id="comment_name" type="text" placeholder="Tên người bình luận">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                 <textarea class="form-control w-100" name="comment" id="comment_content" cols="30" rows="9"
                                           placeholder="Nhận xét sản phẩm"></textarea>
                                    </div>
                                </div>

                            </div>
                            <span id="notifi_comments"></span>
                            <div class="form-group">
                                <button type="button" class="button button-contactForm send-comment btn_1 boxed-btn">Nhận xét</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
                    toastr["error"]( 'Số lượng đặt lớn hơn số lượng còn trong kho, Vui lòng chọn số lượng nhỏ hơn', +cart_product_quantity);
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
