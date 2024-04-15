@extends('layout')
@section('content')
    <div class="col-sm-12 padding-right">
        <div class="features_items">
            <!--features_items-->

            <h2 class="title text-center">Danh mục sản phẩm {{$category_name->category_name}}</h2>

            @foreach($product as $product)
                <a href="{{ route('detailProduct',['id'=>$product->product_id]) }}">

                    <div class="col-sm-3">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img style="width: 100%; height: 160px;"
                                         src="/upload/product/{{ $product->product_image }}" alt=""/>
                                    <h2>{{number_format($product->product_price)}} VNĐ</h2>
                                    <p>{{$product->product_name}}</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm
                                        giỏ hàng</a>
                                    <style type="text/css">
                                        p.qrcode_style{
                                            position: absolute;
                                            top:2%;
                                            left: 3px;
                                        }
                                    </style>
                                    @php
                                        $qrcode_url=url('detailCategory/'.$product->id);
                                     @endphp
                                    <p class="qrcode_style">{{\SimpleSoftwareIO\QrCode\Facades\QrCode::size(50)->generate($qrcode_url)}}</p>
                                </div>
                                <div class="product-overlay">
                                    <div class="overlay-content">
                                        <form>
                                            @csrf
                                            <input type="hidden" value="{{$product->product_id}}" class="cart_product_id_{{$product->product_id}}">
                                            <input type="hidden" value="{{$product->product_name}}" class="cart_product_name_{{$product->product_id}}">
                                            <input type="hidden" value="{{$product->product_image}}" class="cart_product_image_{{$product->product_id}}">
                                            <input type="hidden" value="{{$product->product_price}}" class="cart_product_price_{{$product->product_id}}">
                                            <input type="hidden" value="{{$product->product_quantity}}" class="cart_product_quantity_{{$product->product_id}}">
                                            <input type="hidden" value="1" class="cart_product_qty_{{$product->product_id}}">

                                            <a href="{{ route('detailProduct',['id'=>$product->product_id]) }}">

                                                <h2>{{number_format($product->product_price)}} VNĐ</h2>
                                                <p>{{$product->product_name}}</p>
                                            </a>
                                            @php
                                                $customerId = Session::get('customer_id');
                                            @endphp
                                            @if ($customerId)

                                                <button type="button" name="add-to-cart"
                                                        data-id_product="{{$product->product_id}}"
                                                        class="btn btn-default add-to-cart"><i
                                                        class="fa fa-shopping-cart"></i>Thêm giỏ hàng
                                                </button>

                                            @else

                                                <a href="{{URL::to('/login-checkout')}}"
                                                   class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm
                                                    giỏ hàng</a>
                                            @endif
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach

        </div>
        <!--features_items-->


    </div>
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
                                        window.location.href = "{{url('/gio-hang')}}";
                                    }
                                });
                        }

                    });
                }
            })
        });
    </script>

@endsection
