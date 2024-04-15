@extends('layout')
@section('content')
    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">Kết quả tìm kiếm</h2>
        @foreach($product as $key => $product)
            <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img style="width: 100%; height: 160px;"
                                 src="/upload/product/{{ $product->product_image }}" alt=""/>
                            <h2>{{number_format($product->product_price)}} VNĐ</h2>
                            <p>{{$product->product_name}}</p>
                            <a href="#" class="btn btn-default add-to-cart"><i
                                    class="fa fa-shopping-cart"></i>Thêm
                                giỏ hàng</a>
                        </div>

                    </div>
                </div>
            </div>
        @endforeach
    </div><!--features_items-->
    <!--/recommended_items-->
@endsection
