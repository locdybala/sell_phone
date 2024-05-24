@extends('layout')
@section('content')
<div class="slider-area ">
    <div style="min-height: 300px" class="single-slider slider-height2 d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center">
                        <h2>Sản phẩm trong cửa hàng</h2>
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
                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"> Giá giảm dần</a>
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
<div class="shop-method-area">
    <div class="container">
        <div class="method-wrapper">
            <div class="row d-flex justify-content-between">
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single-method mb-40">
                        <i class="ti-package"></i>
                        <h6>Free Shipping Method</h6>
                        <p>aorem ixpsacdolor sit ameasecur adipisicing elitsf edasd.</p>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single-method mb-40">
                        <i class="ti-unlock"></i>
                        <h6>Secure Payment System</h6>
                        <p>aorem ixpsacdolor sit ameasecur adipisicing elitsf edasd.</p>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single-method mb-40">
                        <i class="ti-reload"></i>
                        <h6>Secure Payment System</h6>
                        <p>aorem ixpsacdolor sit ameasecur adipisicing elitsf edasd.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
