@extends('layout')
@section('content')
    <div class="slider-area ">
        <div style="min-height: 300px" class="single-slider slider-height2 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>Thương hiệu: {{$brand_name}}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Area End-->
    <!-- Latest Products Start -->
    <section class="popular-items latest-padding">
        <div class="container">
            <div class="row product-btn justify-content-between mb-40">
                <div class="properties__button">
                    <!--Nav Button  -->
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Sản phẩm mới</a>
                            <a class="nav-item nav-link" id="nav-price-reduce-tab" data-toggle="tab" href="#nav-price-reduce" role="tab" aria-controls="nav-profile" aria-selected="false"> Giá tăng dần</a>
                            <a class="nav-item nav-link" id="nav-price-increase-tab" data-toggle="tab" href="#nav-price-increase" role="tab" aria-controls="nav-profile" aria-selected="false"> Giá giảm dần</a>
                            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false"> Phổ biến nhất </a>
                        </div>
                    </nav>
                    <!--End Nav Button  -->
                </div>
                <!-- Grid and List view -->
                <div class="grid-list-view">
                </div>
                <!-- Select items -->

            </div>
            <!-- Nav Card -->
            <div class="tab-content" id="nav-tabContent">
                <!-- card one -->
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="row">
                        @foreach($product as $product)
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
                                                <style>.img-cap button a{
                                                        color: #fff;
                                                        background: #f81f1f;
                                                        padding: 20px 0;
                                                        display: block;
                                                        cursor: pointer;
                                                        border: none; /* Loại bỏ viền của button */
                                                        width: 100%; /* Đảm bảo button chiếm toàn bộ chiều rộng của div */
                                                    }</style>

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
                </div>
                <!-- Card two -->
                <div class="tab-pane fade" id="nav-price-reduce" role="tabpanel" aria-labelledby="nav-price-reduce-tab">
                    <div class="row">
                        @foreach($price_reduces as $product)
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
                                                <style>.img-cap button a{
                                                        color: #fff;
                                                        background: #f81f1f;
                                                        padding: 20px 0;
                                                        display: block;
                                                        cursor: pointer;
                                                        border: none; /* Loại bỏ viền của button */
                                                        width: 100%; /* Đảm bảo button chiếm toàn bộ chiều rộng của div */
                                                    }</style>

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
                </div>
                <div class="tab-pane fade" id="nav-price-increase" role="tabpanel" aria-labelledby="nav-price-increase-tab">
                    <div class="row">
                        @foreach($price_increases as $product)
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
                                                <style>.img-cap button a{
                                                        color: #fff;
                                                        background: #f81f1f;
                                                        padding: 20px 0;
                                                        display: block;
                                                        cursor: pointer;
                                                        border: none; /* Loại bỏ viền của button */
                                                        width: 100%; /* Đảm bảo button chiếm toàn bộ chiều rộng của div */
                                                    }</style>

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
                </div>
                <!-- Card three -->
                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                    <div class="row">
                        @foreach($product_populars as $product)
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
                                                <style>.img-cap button a{
                                                        color: #fff;
                                                        background: #f81f1f;
                                                        padding: 20px 0;
                                                        display: block;
                                                        cursor: pointer;
                                                        border: none; /* Loại bỏ viền của button */
                                                        width: 100%; /* Đảm bảo button chiếm toàn bộ chiều rộng của div */
                                                    }</style>

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
                </div>
            </div>
            <!-- End Nav Card -->
        </div>
    </section>
    <!-- Latest Products End -->
    <!--? Shop Method Start-->

@endsection
@section('javascript')
    <script type="text/javascript">
        $(document).ready(function(){
            $('.add-to-cart').click(function(){
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
                        data:{cart_product_id:cart_product_id,cart_product_name:cart_product_name,cart_product_quantity:cart_product_quantity,cart_product_image:cart_product_image,cart_product_price:cart_product_price,cart_product_qty:cart_product_qty,_token:_token},
                        success:function(){

                            swal({
                                title: "Đã thêm sản phẩm vào giỏ hàng",
                                text: "Bạn có thể mua hàng tiếp hoặc tới giỏ hàng để tiến hành thanh toán",
                                cancel: "Xem tiếp",
                                icon: "success",
                                buttons: ["Xem tiếp", "Đi đến giỏ hàng"] ,
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
