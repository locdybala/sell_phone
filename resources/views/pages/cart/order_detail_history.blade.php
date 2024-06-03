@extends('layout')
@section('content')
    <div class="slider-area ">
        <div style="min-height:300px;" class="single-slider slider-height2 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>Chi tiết đơn hàng</h2>
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
                    <h4>Thông tin người đặt</h4>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Tên khách hàng</th>
                            <th>Số điện thoại</th>
                            <th>Email</th>
                            <th style="width:30px;"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <td>{{$customer->customer_name}}</td>
                        <td>{{$customer->customer_phone}}</td>
                        <td>{{$customer->customer_email}}</td>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="cart_inner">
                <div class="table-responsive">
                    <h4>Địa chỉ nhận hàng</h4>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Tên người vận chuyển</th>
                            <th>Địa chỉ</th>
                            <th>Số điện thoại</th>
                            <th>Email</th>
                            <th>Ghi chú</th>
                            <th>Hình thức thanh toán</th>
                            <th style="width:30px;"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <td>{{$shipping->shipping_name}}</td>
                        <td>{{$shipping->shipping_address}}</td>
                        <td>{{$shipping->shipping_phone}}</td>
                        <td>{{$shipping->shipping_email}}</td>
                        <td>{{$shipping->shipping_notes}}</td>
                        <td>@if($shipping->shipping_method==1)
                                <span class="badge badge-warning">Tiền mặt</span>
                            @else
                                <span class="badge badge-success">Thanh toán online</span>
                            @endif
                        </td>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="cart_inner">
                <div class="table-responsive">
                    <h4>Thông tin đơn hàng</h4>
                    <table class="table table-condensed">
                        <thead>
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng kho còn</th>
                            <th>Mã giảm giá</th>
                            <th>Phí ship hàng</th>
                            <th>Số lượng</th>
                            <th>Giá sản phẩm</th>
                            <th>Tổng tiền</th>

                            <th style="width:30px;"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $total = 0;
                        @endphp
                        @foreach($order_details as $key => $details)

                            @php
                                $subtotal = $details->product_price*$details->product_sales_quantity;
                                $total+=$subtotal;
                            @endphp
                            <tr class="color_qty_{{$details->product_id}}">

                                <td>{{$details->product_name}}</td>
                                <td>{{$details->product->product_quantity}}</td>
                                <td>@if($details->product_coupon!='no')
                                        {{$details->product_coupon}}
                                    @else
                                        Không mã
                                    @endif
                                </td>
                                <td>{{number_format($details->product_feeship ,0,',','.')}}đ</td>
                                <td>

                                    <input type="number" min="1"
                                           {{$order_status==2 ? 'disabled' : ''}} class="order_qty_{{$details->product_id}}"
                                           value="{{$details->product_sales_quantity}}" name="product_sales_quantity">

                                    <input type="hidden" name="order_qty_storage"
                                           class="order_qty_storage_{{$details->product_id}}"
                                           value="{{$details->product->product_quantity}}">

                                    <input type="hidden" name="order_code" class="order_code"
                                           value="{{$details->order_code}}">

                                    <input type="hidden" name="order_product_id" class="order_product_id"
                                           value="{{$details->product_id}}">


                                </td>
                                <td>{{number_format($details->product_price ,0,',','.')}}đ</td>
                                <td>{{number_format($subtotal ,0,',','.')}}đ</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="2">
                                @php
                                    $total_coupon = 0;
                                @endphp
                                @if($coupon_condition==1)
                                    @php
                                        $total_after_coupon = ($total*$coupon_number)/100;
                                        echo 'Tổng giảm :'.number_format($total_after_coupon,0,',','.').'</br>';
                                        $total_coupon = $total + $details->product_feeship - $total_after_coupon ;
                                    @endphp
                                @else
                                    @php
                                        echo 'Tổng giảm :'.number_format($coupon_number,0,',','.').'k'.'</br>';
                                        $total_coupon = $total + $details->product_feeship - $coupon_number ;

                                    @endphp
                                @endif

                                Phí ship : {{number_format($details->product_feeship,0,',','.')}}đ</br>
                                Thanh toán: {{number_format($total_coupon,0,',','.')}}đ
                            </td>
                        </tr>
                        </tbody>
                    </table>

                </div>
            </div>
            <a style="margin: 5px;" target="_blank" class="btn btn-primary btn-sm"
               href="{{route('print_order',['order_code' => $details->order_code])}}">In đơn
                hàng</a>
            @if($order_status == 1 || $order_status == 6)
                <form style="padding: 5px;" method="POST"
                      action="{{route('cancel_order',['order_code' => $details->order_code])}}">
                    @csrf
                    @method('post')
                    <button class="btn-danger btn btn-sm" type="submit">Hủy đơn hàng</button>

                </form>
            @endif
        </div>
    </section>
@endsection
