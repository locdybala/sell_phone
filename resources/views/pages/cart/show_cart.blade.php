@extends('home')
@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="{{URL::to('/')}}">Trang chủ</a></li>
                    <li class="active">Giỏ hàng của bạn</li>
                </ol>
            </div>
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {!!   session()->get('message') !!}
                </div>
            @elseif(session()->has('error'))
                <div class="alert alert-danger">
                    {!!  session()->get('error') !!}
                </div>
            @endif
            <div class="table-responsive cart_info">
                <form action="{{route('update_cart')}}" method="POST">
                    {{csrf_field()}}
                    <table class="table table-condensed">
                        <thead>
                            <tr class="cart_menu">
                                <td class="image">Hình ảnh</td>
                                <td class="description">Tên sản phẩm</td>
                                <td class="description">Số lượng trong kho</td>
                                <td class="price">Giá sản phẩm</td>
                                <td class="quantity">Số lượng</td>
                                <td class="total">Thành tiền</td>
                                <td></td>
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
                                    <td class="cart_product">
                                        <img src="{{asset('/upload/product/'.$cart['product_image'])}}" width="90"
                                             alt="{{$cart['product_name']}}"/>
                                    </td>
                                    <td class="cart_description">
                                        <h4><a href=""></a></h4>
                                        <p>{{$cart['product_name']}}</p>
                                    </td>
                                    <td class="cart_description">
                                        <h4><a href=""></a></h4>
                                        <p>{{$cart['product_quantity']}}</p>
                                    </td>
                                    <td class="cart_price">
                                        <p>{{number_format($cart['product_price'],0,',','.')}}đ</p>
                                    </td>
                                    <td class="cart_quantity">
                                        <div class="cart_quantity_button">
                                            <input class="cart_quantity_ " type="number" min="1"
                                                   name="cart_qty[{{$cart['session_id']}}]"
                                                   value="{{$cart['product_qty']}}">

                                        </div>
                                    </td>
                                    <td class="cart_total">
                                        <p class="cart_total_price">
                                            {{number_format($subtotal,0,',','.')}} vnđ
                                        </p>
                                    </td>
                                    <td class="cart_delete">
                                        <a class="cart_quantity_delete"
                                           href="{{route('delete_product_cart',['session_id'=>$cart['session_id']])}}"><i
                                                class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td>
                                    <input type="submit" value="Cập nhật giỏ hàng" name="update_qty"
                                           class="check_out btn btn-default btn-sm">
                                </td>
                                <td>
                                    <a class="btn btn-default check_out" href="{{route('delete_all_cart')}}">Xóa giỏ
                                        hàng</a>
                                </td>
                                <td>
                                    @if(Session::get('coupon'))
                                        <a class="btn btn-default check_out" href="{{route('delete_coupon')}}">Xóa mã
                                            khuyến mãi</a>
                                    @endif
                                </td>
                                <td>
                                    @if(Session::get('customer_id'))
                                        <a class="btn btn-default check_out" href="{{URL::to('/checkout')}}">Thanh toán</a>
                                    @else
                                        <a class="btn btn-default check_out" href="{{URL::to('/login-checkout')}}">Thanh
                                            toán</a>
                                    @endif
                                </td>
                                <td colspan="2">
                                    <li>Tổng <span>{{number_format($total,0,',','.')}}</span></li>
                                    @if(Session::get('coupon'))
                                        <li>
                                            @foreach(Session::get('coupon') as $key =>$value)
                                                @if($value['coupon_condition'] == 1)
                                                    Mã giảm: {{$value['coupon_number']}} %
                                                        @php
                                                            $totalcoupon = $total*$value['coupon_number']/100;
                                                            echo '<p><li>Tổng giảm: '.number_format($totalcoupon,0,',','.').' vnđ</li></p>' ;
                                                        @endphp
                                                    <p><li>Tổng tiền đã giảm: {{number_format($total-$totalcoupon,0,',','.')}}vnđ</li></p>
                                                @elseif($value['coupon_condition']==2)
                                                    Mã giảm: {{ number_format($value['coupon_number'],0,',','.')}} vnđ
                                                        @php
                                                            $totalcoupon = $value['coupon_number'];
                                                            echo '<p><li>Tổng giảm: '.number_format($totalcoupon,0,',','.').' vnđ</li></p>' ;
                                                        @endphp
                                                    <p><li>Tổng tiền đã giảm: {{number_format($total-$totalcoupon,0,',','.')}} vnđ</li></p>
                                                 @endif
                                            @endforeach
                                        </li>
                                    @endif
                                </td>
                            </tr>
                        @else
                            <tr>
                                <td colspan="5"><center>
                                        @php
                                            echo 'Làm ơn thêm sản phẩm vào giỏ hàng';
                                        @endphp
                                    </center></td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </form>
                @if(Session::get('cart'))
                    <tr>
                        <td>
                            <form style=" margin-left: 10px" method="POST" action="{{route('check_coupon')}}">
                                @csrf
                                <input style="width: 200px;" type="text" class="form-control " name="coupon"
                                       placeholder="Nhập mã giảm giá"> <br>
                                <input style="margin-bottom: 10px;margin-top: -10px;" type="submit" style="background-color: #de6e0a !important"
                                       class="btn btn-default check_coupon" value="Tính mã giảm giá">
                            </form>
                        </td>
                    </tr>
                    @endif
            </div>
        </div>
    </section>
@endsection
