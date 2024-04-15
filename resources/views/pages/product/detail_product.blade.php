@extends('layout')
@section('content')
    <style type="text/css">
        .lSSlideOuter .lSPager.lSGallery img {
            display: block;
            height: 140px;
            max-width: 100%;
        }

        #imageGallery li.active {
            border: 4px solid #1ddf61;
        }
    </style>
    <div class="col-sm-12 padding-right">
        <div class="product-details"><!--product-details-->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a
                            href="{{route('detailCategory',[$productDetail->category_id])}}">{{$productDetail->category->category_name}}</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">{{$productDetail->product_name}}</li>
                </ol>
            </nav>
            <div class="col-sm-5">
                <ul id="imageGallery">
                    @foreach($gallery as $gallery)

                        <li data-thumb="{{asset('upload/gallery/'.$gallery->gallery_name)}}"
                            data-src="{{asset('upload/gallery/'.$gallery->gallery_name)}}">
                            <img width="100%" height="400px;" alt="{{$gallery->gallery_name}}"
                                 src="{{asset('upload/gallery/'.$gallery->gallery_name)}}"/>
                        </li>
                    @endforeach

                </ul>

            </div>
            <div class="col-sm-7">
                <div class="product-information"><!--/product-information-->
                    <img src="images/product-details/new.jpg" class="newarrival" alt=""/>
                    <h2>{{$productDetail->product_name}}</h2>
                    <p>Mã ID: {{$productDetail->product_id}}</p>
                    <img src="" alt=""/>
                    <form action="{{URL::to('/save-cart')}}" method="POST">
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

                        <span>
									<span>{{number_format($productDetail->product_price,0,',','.').'VNĐ'}}</span>

									<label>Số lượng:</label>
									<input name="qty" type="number" min="1"
                                           class="cart_product_qty_{{$productDetail->product_id}}" value="1"/>
									<input name="productid_hidden" type="hidden"
                                           value="{{$productDetail->product_id}}"/>
								</span>
                        @php
                            $customerId = Session::get('customer_id');
                        @endphp
                        @if ($customerId)
                            <input type="button" value="Thêm giỏ hàng" class="btn btn-primary btn-sm add-to-cart"
                                   data-id_product="{{$productDetail->product_id}}" name="add-to-cart">
                        @else
                            <a href="{{URL::to('/login-checkout')}}"
                               class="btn btn-primary btn-sm add-to-cart">Thêm
                                giỏ hàng</a>
                        @endif
                    </form>
                    <p><b>Tình trạng:</b> Còn hàng</p>
                    <p><b>Danh mục:</b> {{$productDetail->category->category_name}}</p>
                    <p><b>Thương hiệu:</b> {{$productDetail->brand->brand_name}}</p>
                    <a href=""><img src="images/product-details/share.png" class="share img-responsive" alt=""/></a>
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
                </div><!--/product-information-->
            </div>
        </div><!--/product-details-->

        <div class="category-tab shop-details-tab"><!--category-tab-->
            <div class="col-sm-12">
                <ul class="nav nav-tabs">
                    <li><a href="#details" data-toggle="tab">Mô tả</a></li>
                    <li><a href="#companyprofile" data-toggle="tab">Chi tiết sản phẩm</a></li>
                    <li class="active"><a href="#reviews" data-toggle="tab">Đánh giá</a></li>
                </ul>
            </div>
            <div class="tab-content">
                <div class="tab-pane fade ml-2 in" style="margin-left: 10px !important;" id="details">
                    <div class="col-sm-12">
                        <p>{!! $productDetail->product_content!!}</p>
                    </div>
                </div>

                <div class="tab-pane fade ml-2 in" style="margin-left: 10px !important;" id="companyprofile">
                    <div class="col-sm-12">
                        <p>{!! $productDetail->product_desc!!}</p>
                    </div>
                </div>
                <div class="tab-pane fade active in" id="reviews">
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
                            <b>Rating: </b> <img src="images/product-details/rating.png" alt=""/>
                            <button type="button" class="btn btn-default pull-right send-comment">Đánh giá
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div><!--/category-tab-->
        <div class="recommended_items"><!--recommended_items-->
            <h2 class="title text-center">Sản phẩm gợi ý</h2>

            <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="item active">
                        @foreach($related_products as $related_product)
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img style="width: 100%; height: 160px;"
                                                 src="/upload/product/{{ $related_product->product_image }}" alt=""/>
                                            <h2>{{number_format($related_product->product_price)}} VNĐ</h2>
                                            <p>{{$related_product->product_name}}</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i
                                                    class="fa fa-shopping-cart"></i>Thêm
                                                giỏ hàng</a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                    <i class="fa fa-angle-left"></i>
                </a>
                <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>
        </div><!--/recommended_items-->
    </div>
@endsection
@section('javascript')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#imageGallery').lightSlider({
                gallery: true,
                item: 1,
                loop: true,
                thumbItem: 3,
                slideMargin: 0,
                enableDrag: false,
                currentPagerPosition: 'left',
                onSliderLoad: function (el) {
                    el.lightGallery({
                        selector: '#imageGallery .lslide'
                    });
                }
            });
        });
    </script>

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
