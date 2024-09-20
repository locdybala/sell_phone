@extends('layout')
@section('content')
    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Sản phẩm</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="{{route('shop')}}">Sản phẩm</a></li>
            <li class="breadcrumb-item active text-white">{{$category_name->category_name}}</li>
        </ol>
    </div>
    <!-- Single Page Header End -->


    <!-- Fruits Shop Start-->
    <div class="container-fluid fruite py-5">
        <div class="container py-5">
            <h1 class="mb-4">King Bio Shop</h1>
            <div class="row g-4">
                <div class="col-lg-12">
                    <div class="row g-4">
                        <div class="col-xl-3">
                            <div class="input-group w-100 mx-auto d-flex">
                                <input type="search" class="form-control p-3" placeholder="Nhập từ khoá tìm kiếm"
                                       aria-describedby="search-icon-1">
                                <span id="search-icon-1" class="input-group-text p-3"><i
                                        class="fa fa-search"></i></span>
                            </div>
                        </div>
                        <div class="col-6"></div>
                        <div class="col-xl-3">
                        </div>
                    </div>
                    <div class="row g-4 mt-3">
                        <div class="col-lg-12">
                            <div class="row g-4 justify-content-between">
                                @if($products->isEmpty())
                                    <div class="col-12 text-center">
                                        <p>Chưa có sản phẩm</p>
                                    </div>
                                @else
                                @foreach($products as $product)
                                    <div class="col-md-6 col-lg-4 col-xl-4">
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
                                            <div class="rounded position-relative fruite-item">
                                                <div class="fruite-img">
                                                    <img src="/upload/product/{{ $product->product_image }}"
                                                         class="img-fluid w-100 rounded-top" alt="">
                                                </div>
                                                <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                    <a href="{{ route('detailProduct',['id'=>$product->product_id]) }}">
                                                        <h4>{{$product->product_name}}</h4></a>
                                                    <div class="d-flex justify-content-between flex-lg-wrap">
                                                        <p class="text-dark fs-5 fw-bold mb-0">{{number_format($product->product_price)}}
                                                            đ</p>
                                                        @php
                                                            $customerId = Session::get('customer_id');
                                                        @endphp
                                                        @if ($customerId)
                                                            <button type="button" name="add-to-cart"
                                                                    data-id_product="{{$product->product_id}}"
                                                                    class="btn border add-to-cart border-secondary rounded-pill px-3 text-primary">
                                                                <i class="fa fa-shopping-bag me-2 text-primary"></i>Thêm
                                                                giỏ
                                                                hàng
                                                            </button>
                                                        @else
                                                            <a href="{{URL::to('/login-checkout')}}"
                                                               class="btn border add-to-cart border-secondary rounded-pill px-3 text-primary"><i
                                                                    class="fa fa-shopping-bag me-2 text-primary"></i>Thêm
                                                                giỏ hàng</a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                @endforeach
                                    <div class="col-12">
                                        <div class="pagination d-flex justify-content-center mt-5">
                                            <a href="{{$products->previousPageUrl()}}"
                                               class="rounded {{$products->onFirstPage() ? 'disabled' : ''}}">&laquo;</a>

                                            @for ($i = 1; $i <= $products->lastPage(); $i++)
                                                <a href="{{$products->url($i)}}"
                                                   class="rounded {{$products->currentPage() === $i ? 'active' : ''}}">{{$i}}</a>
                                            @endfor

                                            <a href="{{$products->nextPageUrl()}}"
                                               class="rounded {{$products->hasMorePages() ? '' : 'disabled'}}">&raquo;</a>
                                        </div>
                                    </div>
                                @endif
                            </div>
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
