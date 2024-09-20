@extends('layout')
@section('content')
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Giỏ hàng</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
            <li class="breadcrumb-item active text-white">Giỏ hàng</li>
        </ol>
    </div>
    <div class="container-fluid py-5">
        <div class="container py-5">
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {!!   session()->get('message') !!}
                </div>
            @elseif(session()->has('error'))
                <div class="alert alert-danger">
                    {!!  session()->get('error') !!}
                </div>
            @endif
            <div class="table-responsive">
                <form action="{{route('update_cart')}}" method="post">
                    @csrf
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Sản phẩm</th>
                        <th scope="col">Tên</th>
                        <th scope="col">Số lượng trong kho</th>
                        <th scope="col">Giá tiền</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Thành tiền</th>
                        <th scope="col">Handle</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(Session::get('cart') == true)
                        @php
                            $total = 0;
                        @endphp
                        @foreach(Session::get('cart') as $key => $cart)
                            @php
                                $subtotal = $cart['product_price']*$cart['product_qty'];
                                $total+=$subtotal;
                            @endphp
                            <tr>
                                <th scope="row">
                                    <div class="d-flex align-items-center">
                                        <img src="{{asset('/upload/product/'.$cart['product_image'])}}" class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;" alt="">
                                    </div>
                                </th>
                                <td>
                                    <p class="mb-0 mt-4">{{$cart['product_name']}}</p>
                                </td>
                                <td>
                                    <p class="mb-0 mt-4">{{$cart['product_quantity']}}</p>
                                </td>
                                <td>
                                    <p class="mb-0 mt-4">{{number_format($cart['product_price'],0,',','.')}}đ</p>
                                </td>
                                <td>
                                    <div class="input-group quantity mt-4" style="width: 100px;">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-minus rounded-circle bg-light border" >
                                                <i class="fa fa-minus"></i>
                                            </button>
                                        </div>
                                        <input type="text" class="form-control form-control-sm text-center border-0 cart_quantity_{{$cart['session_id']}}" name="cart_qty[{{$cart['session_id']}}]"
                                               value="{{$cart['product_qty']}}">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-plus rounded-circle bg-light border">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="mb-0 mt-4">{{number_format($subtotal,0,',','.')}}đ</p>
                                </td>
                                <td class="cart_delete">
                                    <a class="btn btn-md rounded-circle bg-light border mt-4 cart_quantity_delete"
                                       href="{{route('delete_product_cart',['session_id'=>$cart['session_id']])}}"><i class="fa fa-times text-danger"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        <tr class="bottom_button">
                            <td colspan="4">
                                <input type="submit" value="Cập nhật giỏ hàng" name="update_qty"
                                       class="genric-btn info small">
                            </td>
                            <td colspan="3">
                                <div class="cupon_text float-right">
                                    <a class="genric-btn success small" href="{{route('delete_all_cart')}}">Xóa
                                        giỏ
                                        hàng</a>
                                    @if(Session::get('coupon'))
                                        <a class="genric-btn success small" href="{{route('delete_coupon')}}">Xoá
                                            mã khuyến
                                            mãi</a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @else
                        <tr>
                            <td colspan="5">
                                <center>
                                    @php
                                        echo 'Làm ơn thêm sản phẩm vào giỏ hàng';
                                    @endphp
                                </center>
                            </td>
                        </tr>
                    @endif
                    </tbody>
                </table>
                </form>
            </div>
            <div class="mt-5">
                @if(Session::get('cart'))
                    <form  method="POST"
                          action="{{route('check_coupon')}}">
                        @csrf
                        <input style="width: 200px; margin-right: 10px;" type="text" class="border-0 border-bottom rounded me-5 py-3 mb-4 "
                               name="coupon"
                               placeholder="Nhập mã giảm giá">
                        <button class="btn border-secondary rounded-pill px-4 py-3 text-primary" type="submit">Mã giảm giá</button>
                    </form>
                @endif
            </div>
            <div class="row g-4 justify-content-end">
                <div class="col-8"></div>
                <div class="col-sm-8 col-md-7 col-lg-6 col-xl-4">
                    <div class="bg-light rounded">
                        <div class="p-4">
                            <h1 class="display-6 mb-4">Tổng <span class="fw-normal">giỏ hàng</span></h1>
                            <div class="d-flex justify-content-between mb-4">
                                <h5 class="mb-0 me-4">Tạm tính:</h5>
                                <p class="mb-0">{{number_format($total,0,',','.')}}đ</p>
                            </div>
                            @if(Session::get('coupon'))
                                @foreach(Session::get('coupon') as $key =>$value)
                                    @if($value['coupon_condition'] == 1)
                                        @php
                                            $totalCoupon = $total*$value['coupon_number']/100;
                                        @endphp
                                    @else
                                        @php
                                            $totalCoupon = $value['coupon_number'];
                                        @endphp
                                    @endif
                                @endforeach
                                    <div class="d-flex justify-content-between">
                                        <h5 class="mb-0 me-4">Mã giảm giá</h5>
                                        <div class="">
                                            <p class="mb-0">-{{number_format($totalCoupon,0,',','.') }} đ</p>
                                        </div>
                                    </div>
                                @php $total = $total- $totalCoupon; @endphp
                            @endif

{{--                            <div class="d-flex justify-content-between">--}}
{{--                                <h5 class="mb-0 me-4">Shipping</h5>--}}
{{--                                <div class="">--}}
{{--                                    <p class="mb-0">Flat rate: $3.00</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <p class="mb-0 text-end">Shipping to Ukraine.</p>--}}
                        </div>
                        <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                            <h5 class="mb-0 ps-4 me-4">Tổng cộng</h5>
                            <p class="mb-0 pe-4">{{number_format($total,0,',','.')}}</p>
                        </div>
                        @if(Session::get('customer_id'))
                            <a class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4" href="{{URL::to('/checkout')}}">
                                Tiến hành thanh toán</a>
                        @else
                            <a class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4" href="{{URL::to('/login-checkout')}}">
                                Tiến hành thanh toán
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="">
        $(document).ready(function() {
            // Khi nhấn nút tăng
            $('.input-number-increment').click(function() {
                debugger
                var $input = $(this).siblings('input');
                var currentVal = parseInt($input.val());
                if (!isNaN(currentVal) && currentVal < 10) {
                    $input.val(currentVal + 1);
                }
            });

            // Khi nhấn nút giảm
            $('.input-number-decrement').click(function() {
                var $input = $(this).siblings('input');
                var currentVal = parseInt($input.val());
                if (!isNaN(currentVal) && currentVal > 0) {
                    $input.val(currentVal - 1);
                }
            });
        });
    </script>
@endsection
