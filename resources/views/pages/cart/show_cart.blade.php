@extends('layout')
@section('content')
    <div class="slider-area ">
        <div style="min-height:300px;" class="single-slider slider-height2 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>Giỏ hàng</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--================Cart Area =================-->
    <section class="cart_area section_padding">
        <div class="container">
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {!!   session()->get('message') !!}
                </div>
            @elseif(session()->has('error'))
                <div class="alert alert-danger">
                    {!!  session()->get('error') !!}
                </div>
            @endif
            <div class="cart_inner">
                <div class="table-responsive">
                    <form action="{{route('update_cart')}}" method="post">
                        @csrf
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Sản phẩm</th>
                                <th scope="col">Số lượng trong kho</th>
                                <th scope="col">Giá tiền</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Thành tiền</th>
                                <th></th>
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
                                        <td>
                                            <div class="media">
                                                <div class="d-flex">
                                                    <img src="{{asset('/upload/product/'.$cart['product_image'])}}"
                                                         alt="{{$cart['product_name']}}"/>
                                                </div>
                                                <div class="media-body">
                                                    <p>{{$cart['product_name']}}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{$cart['product_quantity']}}</td>
                                        <td>
                                            <h5>{{number_format($cart['product_price'],0,',','.')}}đ</h5>
                                        </td>
                                        <td>
                                            <div class="product_count">
                                                <span class="input-number-decrement"> <i class="ti-minus"></i></span>
                                                <input class="input-number cart_quantity_{{$cart['session_id']}}" type="text"
                                                       name="cart_qty[{{$cart['session_id']}}]"
                                                       value="{{$cart['product_qty']}}" min="0" max="10">
                                                <span class="input-number-increment"> <i class="ti-plus"></i></span>
                                            </div>
                                        </td>
                                        <td>
                                            <h5>{{number_format($subtotal,0,',','.')}}đ</h5>
                                        </td>
                                        <td class="cart_delete">
                                            <a class="cart_quantity_delete"
                                               href="{{route('delete_product_cart',['session_id'=>$cart['session_id']])}}"><i
                                                    class="fa fa-times"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                <tr class="bottom_button">
                                    <td>
                                        <input type="submit" value="Cập nhật giỏ hàng" name="update_qty"
                                               class="genric-btn info small">
                                    </td>
                                    <td>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td>
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
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <h5>Tổng tiền sản phẩm</h5>
                                    </td>
                                    <td>
                                        <h5>{{number_format($total,0,',','.')}}đ</h5>
                                    </td>
                                </tr>
                                <tr class="shipping_area">
                                    <td></td>
                                    <td></td>
                                    <td>

                                    </td>
                                    <td></td>

                                    <td>
                                        <div class="shipping_box">
                                            <ul class="list">
                                                <li>
                                                    Tổng tiền sản phẩm: {{number_format($total,0,',','.')}}đ
                                                </li>
                                                @if(Session::get('coupon'))
                                                    <li>
                                                        @foreach(Session::get('coupon') as $key =>$value)
                                                            @if($value['coupon_condition'] == 1)
                                                                Mã giảm: {{$value['coupon_code']}} %
                                                                @php
                                                                    $totalcoupon = $total*$value['coupon_number']/100;
                                                                    echo '<p><li>Tổng giảm: '.number_format($totalcoupon,0,',','.').' vnđ</li></p>' ;
                                                                @endphp
                                                                <p>
                                                    <li>Tổng tiền
                                                        thanh toán: {{number_format($total-$totalcoupon,0,',','.')}}vnđ
                                                    </li></p>
                                                @elseif($value['coupon_condition']==2)
                                                    Mã giảm: {{ ($value['coupon_code'])}} vnđ
                                                    @php
                                                        $totalcoupon = $value['coupon_number'];
                                                        echo '<p><li>Tổng giảm: '.number_format($totalcoupon,0,',','.').' vnđ</li></p>' ;
                                                    @endphp
                                                    <p>
                                                        <li>Tổng tiền
                                                            thanh toán: {{number_format($total-$totalcoupon,0,',','.')}}vnđ
                                                        </li>
                                                    </p>
                                                    @endif
                                                    @endforeach
                                                    </li>
                                                @endif
                                            </ul>
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
                    <div style="padding-bottom: 20px;" class="row">
                        <div class="col-md-6">
                            @if(Session::get('cart'))

                                <form style=" display: flex" method="POST"
                                      action="{{route('check_coupon')}}">
                                    @csrf
                                    <input style="width: 200px; margin-right: 10px;" type="text" class="form-control "
                                           name="coupon"
                                           placeholder="Nhập mã giảm giá">
                                    <input type="submit"
                                           class="genric-btn btn-success radius small" value="Tính mã giảm giá">
                                </form>
                            @endif
                        </div>
                        <div class="checkout_btn_inner col-md-6">
                            <div class="float-right">
                                <a class="genric-btn primary-border" href="{{route('shop')}}">Tiếp tục mua hàng</a>
                                @if(Session::get('customer_id'))
                                    <a class="genric-btn danger" href="{{URL::to('/checkout')}}">Thanh
                                        toán</a>
                                @else
                                    <a class="genric-btn danger" href="{{URL::to('/login-checkout')}}">Thanh
                                        toán</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
