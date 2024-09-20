@extends('layout')
@section('content')
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Thanh toán</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
            <li class="breadcrumb-item active text-white">Thành toán đơn hàng</li>
        </ol>
    </div>
    <div class="container-fluid py-5">
        <div class="container py-5">
            <form action="#" method="post">
                @csrf
                <div class="row g-5">
                    <div class="col-md-12 col-lg-6 col-xl-7">
                        <h4 class="text-uppercase">THÔNG TIN THANH TOÁN</h4>
                        <div class="row">
                            <div class="col-md-12 col-lg-6">
                                <div class="form-item w-100">
                                    <label class="form-label my-3">Tài khoản email<sup>*</sup></label>
                                    <input type="text" class="form-control" id="shipping_email"
                                           name="shipping_email" value="{{$customer->customer_email}}">
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-6">
                                <div class="form-item w-100">
                                    <label class="form-label my-3">Tên người nhận<sup>*</sup></label>
                                    <input type="text" class="form-control" id="shipping_name"
                                           name="shipping_name" value="{{$customer->customer_name}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-item">
                            <label class="form-label my-3">Địa chỉ giao hàng<sup>*</sup></label>
                            <input type="text" class="form-control" id="shipping_address"
                                   name="shipping_address" value="{{$customer->customer_address}}">
                        </div>
                        <div class="form-item">
                            <label class="form-label my-3">Số điện thoại <sup>*</sup></label>
                            <input type="text" class="form-control" id="shipping_phone"
                                   name="shipping_phone" value="{{$customer->customer_phone}}">
                        </div>
                        <div class="form-item">
                            <label class="form-label my-3">Ghi chú đơn hàng</label>
                            <textarea name="shipping_notes" id="shipping_notes" class="form-control" spellcheck="false"
                                      cols="30" rows="11"
                                      placeholder=""></textarea>
                        </div>
                        @if(Session::get('fee'))
                            <input type="hidden" name="order_fee" class="order_fee"
                                   value="{{Session::get('fee')}}">
                        @else
                            <input type="hidden" name="order_fee" class="order_fee" value="30000">
                        @endif

                        @if(Session::get('coupon'))
                            @foreach(Session::get('coupon') as $key => $cou)
                                <input type="hidden" name="order_coupon" class="order_coupon"
                                       value="{{$cou['coupon_code']}}">
                            @endforeach
                        @else
                            <input type="hidden" name="order_coupon" class="order_coupon"
                                   value="no">
                        @endif
                    </div>
                    <div class="col-md-12 col-lg-6 col-xl-5">
                        @if(Session::get('cart')==true)
                            @php
                                $total = 0;
                            @endphp
                            <h4 class="text-uppercase">Đơn hàng của bạn</h4>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">Sản phẩm</th>
                                        <th scope="col">Tên</th>
                                        <th scope="col">Giá</th>
                                        <th scope="col">Số lượng</th>
                                        <th scope="col">Thành tiền</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach(Session::get('cart') as $key => $cart)
                                        @php
                                            $subtotal = $cart['product_price']*$cart['product_qty'];
                                            $total+=$subtotal;
                                        @endphp
                                        <tr>
                                            <th scope="row">
                                                <div class="d-flex align-items-center mt-2">
                                                    <img src="{{asset('/upload/product/'.$cart['product_image'])}}"
                                                         class="img-fluid rounded-circle"
                                                         style="width: 90px; height: 90px;" alt="">
                                                </div>
                                            </th>
                                            <td class="py-5">{{$cart['product_name']}}</td>
                                            <td class="py-5">{{number_format($cart['product_price'],0,',','.')}}đ</td>
                                            <td class="py-5">{{$cart['product_quantity']}}</td>
                                            <td class="py-5">{{number_format($subtotal,0,',','.')}}đ</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <th scope="row">
                                        </th>
                                        <td class="py-5"></td>
                                        <td class="py-5"></td>
                                        <td class="py-5">
                                            <p class="mb-0 text-dark py-3">Tạm tính</p>
                                        </td>
                                        <td class="py-5">
                                            <div class="py-3 border-bottom border-top">
                                                <p class="mb-0 text-dark">{{number_format($total,0,',','.')}}đ</p>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        @if(Session::get('coupon'))
                                            <li>

                                                @foreach(Session::get('coupon') as $key => $cou)
                                                    @if($cou['coupon_condition']==1)
                                                        Mã giảm : {{$cou['coupon_number']}} %
                                                        <span>
                                                            @php
                                                                $total_coupon = ($total*$cou['coupon_number'])/100;
                                                            @endphp
                                                        </span>
                                                        @php
                                                            $total_after_coupon = $total-$total_coupon;
                                                        @endphp
                                                    @elseif($cou['coupon_condition']==2)
                                                        Mã giảm
                                                        : {{number_format($cou['coupon_number'],0,',','.')}} k
                                                        @php
                                                            $total_coupon = $total - $cou['coupon_number'];
                                                        @endphp
                                                        @php
                                                            $total_after_coupon = $total_coupon;
                                                        @endphp
                                                    @endif
                                                @endforeach


                                            </li>
                                        @endif
                                        <th scope="row">
                                        </th>
                                        <td class="py-5">
                                            <p class="mb-0 text-dark py-4">Shipping</p>
                                        </td>
                                        <td colspan="3" class="py-5">
                                            <div class="form-check text-start">
                                                <input type="checkbox" class="form-check-input bg-primary border-0"
                                                       id="Shipping-1" name="Shipping-1" value="Shipping">
                                                <label class="form-check-label" for="Shipping-1">Free Shipping</label>
                                            </div>
                                            <div class="form-check text-start">
                                                <input type="checkbox" class="form-check-input bg-primary border-0"
                                                       id="Shipping-2" name="Shipping-1" value="Shipping">
                                                <label class="form-check-label" for="Shipping-2">Flat rate:
                                                    $15.00</label>
                                            </div>
                                            <div class="form-check text-start">
                                                <input type="checkbox" class="form-check-input bg-primary border-0"
                                                       id="Shipping-3" name="Shipping-1" value="Shipping">
                                                <label class="form-check-label" for="Shipping-3">Local Pickup:
                                                    $8.00</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                        </th>
                                        <td class="py-5">
                                            <p class="mb-0 text-dark text-uppercase py-3">TOTAL</p>
                                        </td>
                                        <td class="py-5"></td>
                                        <td class="py-5"></td>
                                        <td class="py-5">
                                            <div class="py-3 border-bottom border-top">
                                                <p class="mb-0 text-dark">$135.00</p>
                                            </div>
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                            <div
                                class="row g-4 text-center align-items-center justify-content-center border-bottom py-3">
                                <div class="col-12">
                                    <div class="form-check text-start my-3">
                                        <input checked type="radio" class="form-check-input bg-primary border-0"
                                               id="Transfer-1" name="payment_select" value="1">
                                        <label class="form-check-label" for="Transfer-1">Trả tiền mặt khi nhận hàng</label>
                                    </div>
                                    <p class="text-start text-dark">Trả tiền mặt khi giao hàng.</p>
                                </div>
                            </div>
                            <div
                                class="row g-4 text-center align-items-center justify-content-center border-bottom py-3">
                                <div class="col-12">
                                    <div class="form-check text-start my-3">
                                        <input type="radio" class="form-check-input bg-primary border-0"
                                               id="Payments-1" name="payment_select" value="2">
                                        <label class="form-check-label" for="Payments-1">Thanh toán qua VNPAY</label>
                                        <p>Thực hiện thanh toán online qua app ngân hàng VNPAY</p>
                                    </div>
                                </div>
                            </div>

                            <div
                                class="row g-4 text-center align-items-center justify-content-center border-bottom py-3">
                                <div class="col-12">
                                    <div class="form-check text-start my-3">
                                        <input type="radio" class="form-check-input bg-primary border-0"
                                               id="Paypal-1" name="payment_select" value="3">
                                        <label class="form-check-label" for="Paypal-1">Chuyển khoản ngân hàng</label>
                                        <p>Thực hiện thanh toán vào ngay tài khoản ngân hàng của chúng tôi. Vui lòng sử dụng Mã đơn hàng của bạn trong phần Nội dung thanh toán. Đơn hàng sẽ đươc giao sau khi tiền đã chuyển.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-4 text-center align-items-center justify-content-center pt-4">
                                <input type="button" name="send_order"
                                        class="btn send_order border-secondary py-3 px-4 text-uppercase w-100 text-primary"
                                value="Đặt hàng">

                            </div>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--================Checkout Area =================-->
    <section class="checkout_area section_padding">
        <div class="container">
            <div class="cupon_area">
                <div class="row">
                    <div class="col-lg-4">
                        <form method="POST" action="{{route('check_coupon')}}">
                            @csrf
                            <div class="check_title">
                                <h2>
                                    Bạn có phiếu giảm giá?
                                    <a href="#">Hãy nhập mã giảm giá tại đây</a>
                                </h2>
                            </div>
                            <input type="text" name="coupon" placeholder="Nhập mã giảm giá"/>
                            <input style="margin-top: -5px; margin-bottom: 15px;" type="submit"
                                   class="tp_btn update"
                                   name="check_coupon" value="Áp dụng">
                        </form>
                    </div>
                    <div class="col-lg-8">
                        <form>
                            @csrf
                            <div class="col-md-12 form-group">
                                <label for="">Chọn thành phố</label>
                                <select name="city" id="city"
                                        class="form-select choose city">
                                    <option value="">--Chọn tỉnh thành phố--</option>
                                    @foreach($city as $key => $ci)
                                        <option value="{{$ci->matp}}">{{$ci->name_city}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12 form-group ">
                                <label for="exampleInputPassword1">Chọn quận huyện</label>
                                <select name="province" id="province"
                                        class="form-select province choose">
                                    <option value="">--Chọn quận huyện--</option>

                                </select>
                            </div>
                            <div class="col-md-12 form-group ">
                                <label for="exampleInputPassword1">Chọn xã phường</label>
                                <select name="wards" id="wards"
                                        class="form-select wards">
                                    <option value="">--Chọn xã phường--</option>
                                </select>
                            </div>
                            <input type="button"
                                   value="Tính phí vận chuyển" name="calculate_order"
                                   class="btn btn-default update calculate_delivery">
                        </form>
                    </div>
                </div>
            </div>
            <div class="billing_details">
                <div class="row">
                    <form class="row contact_form" action="#" method="post" novalidate="novalidate">
                        @csrf
                        <style>
                            .checkout_area .form-control {
                                border: 1px solid #ced4da !important;
                            }
                        </style>
                        <div class="col-lg-8">
                            <h3>Chi tiết thanh toán</h3>
                            <div class="col-md-12 form-group p_star">
                                <label for="shipping_email">Tài khoản email <span class="required">*</span></label>
                                <input type="text" class="form-control" id="shipping_email"
                                       name="shipping_email" value="{{$customer->customer_email}}"/>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <label for="shipping_name">Tên người nhận<span class="required">*</span></label>
                                <input type="text" class="form-control" id="shipping_name"
                                       name="shipping_name" value="{{$customer->customer_name}}"/>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <label for="shipping_address">Địa chỉ giao hàng <span class="required">*</span></label>
                                <input type="text" class="form-control" id="shipping_address"
                                       name="shipping_address" value="{{$customer->customer_address}}"/>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <label for="shipping_phone">Số điện thoại <span class="required">*</span></label>
                                <input type="text" class="form-control" id="shipping_phone"
                                       name="shipping_phone" value="{{$customer->customer_phone}}"/>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <label for="shipping_notes">Ghi chú đơn hàng</label>
                                <textarea class="form-control" name="shipping_notes" id="shipping_notes" rows="1"
                                ></textarea>

                            </div>
                            @if(Session::get('fee'))
                                <input type="hidden" name="order_fee" class="order_fee"
                                       value="{{Session::get('fee')}}">
                            @else
                                <input type="hidden" name="order_fee" class="order_fee" value="30000">
                            @endif

                            @if(Session::get('coupon'))
                                @foreach(Session::get('coupon') as $key => $cou)
                                    <input type="hidden" name="order_coupon" class="order_coupon"
                                           value="{{$cou['coupon_code']}}">
                                @endforeach
                            @else
                                <input type="hidden" name="order_coupon" class="order_coupon"
                                       value="no">
                            @endif
                        </div>
                        <div class="col-lg-4">
                            <div class="order_box">
                                @if(Session::get('cart')==true)
                                    @php
                                        $total = 0;
                                    @endphp
                                    <h2>Xem lại đơn hàng</h2>
                                    <ul class="list">
                                        <li>
                                            <a href="#">Sản phẩm
                                                <span>Thành tiền</span>
                                            </a>
                                        </li>
                                        @foreach(Session::get('cart') as $key => $cart)
                                            @php
                                                $subtotal = $cart['product_price']*$cart['product_qty'];
                                                $total+=$subtotal;
                                            @endphp
                                            <li>
                                                <a href="#"> {{substr($cart['product_name'], 0, 18) . '...'}}
                                                    <span class="middle">x {{$cart['product_qty']}}</span>
                                                    <span class="last">{{number_format($subtotal,0,',','.')}}đ</span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <ul class="list list_2">
                                        <li>
                                            <a href="#">Tổng tiền
                                                <span>{{number_format($total,0,',','.')}}đ</span>
                                            </a>
                                        </li>
                                        @if(Session::get('coupon'))
                                            <li>

                                                @foreach(Session::get('coupon') as $key => $cou)
                                                    @if($cou['coupon_condition']==1)
                                                        Mã giảm : {{$cou['coupon_number']}} %
                                                        <span>
                                                            @php
                                                                $total_coupon = ($total*$cou['coupon_number'])/100;

                                                            @endphp
                                                        </span>
                                                        @php
                                                            $total_after_coupon = $total-$total_coupon;
                                                        @endphp
                                                    @elseif($cou['coupon_condition']==2)
                                                        Mã giảm
                                                        : {{number_format($cou['coupon_number'],0,',','.')}} k
                                                        @php
                                                            $total_coupon = $total - $cou['coupon_number'];
                                                        @endphp
                                                        @php
                                                            $total_after_coupon = $total_coupon;
                                                        @endphp
                                                    @endif
                                                @endforeach


                                            </li>
                                        @endif
                                        <li>
                                            <a href="#">Phí vận chuyển
                                                @if(Session::get('fee'))
                                                        <?php $total_after_fee = $total + Session::get('fee'); ?>
                                                    <span>{{number_format(Session::get('fee'),0,',','.')}}đ</span>
                                                @else
                                                    <span>Mặc định: 30.000đ</span>
                                                @endif

                                            </a>
                                        </li>
                                        <li>
                                            @php
                                                if(Session::get('fee') && !Session::get('coupon')){
                                                    $total_after = $total_after_fee;
                                                }elseif(!Session::get('fee') && Session::get('coupon')){
                                                    $total_after = $total_after_coupon;
                                                }elseif(Session::get('fee') && Session::get('coupon')){
                                                    $total_after = $total_after_coupon;
                                                    $total_after = $total_after + Session::get('fee');
                                                }elseif(!Session::get('fee') && !Session::get('coupon')){
                                                    $total_after = $total;
                                                }

                                            @endphp
                                            <a href="#">Thành tiền
                                                <span>{{number_format($total_after,0,',','.')}}đ </span>
                                                <input type="hidden" name="total_after" class="total_after"
                                                       value="{{$total_after}}">
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="payment_item">
                                        <div class="radion_btn">
                                            <input checked type="radio" value="1" id="f-option5" name="payment_select"/>
                                            <label for="f-option5">Thanh toán trực tiếp</label>
                                            <div class="check"></div>
                                        </div>
                                    </div>
                                    <style>
                                        .radion_btn img {
                                            right: 40px;
                                        }
                                    </style>
                                    <div class="payment_item active">
                                        <div class="radion_btn">
                                            <input type="radio" value="2" id="f-option6" name="payment_select"/>
                                            <label for="f-option6">VNPAY </label>
                                            <img
                                                style="width: 50px; height: 50px; right: 185px !important; top: -14px !important;"
                                                src="{{asset('frontend/images/home/vnpay.jpg')}}"
                                                alt=""/>
                                            <div class="check"></div>
                                        </div>
                                    </div>
                                    {{--                                    <div class="payment_item">--}}
                                    {{--                                        <div class="radion_btn">--}}
                                    {{--                                            <input type="radio" value="3" id="f-option7" name="payment_select"/>--}}
                                    {{--                                            <label for="f-option7">Thanh toán momo</label>--}}
                                    {{--                                            <img style="width: 25px; height: 25px; right: 120px !important; top: -3px !important;"--}}
                                    {{--                                                 src="{{asset('frontend/images/home/momo.jpg')}}"--}}
                                    {{--                                                 alt=""/>--}}
                                    {{--                                            <div class="check"></div>--}}
                                    {{--                                        </div>--}}
                                    {{--                                    </div>--}}
                                    {{--                                    <div class="payment_item">--}}
                                    {{--                                        <div class="radion_btn">--}}
                                    {{--                                            <input type="radio" value="4" id="f-option8" name="payment_select"/>--}}
                                    {{--                                            <label for="f-option8">Thanh toán OnePay</label>--}}
                                    {{--                                            <img style="width: 50px; height: 20px; right: 88px !important; top: 1px !important;"--}}
                                    {{--                                                 src="{{asset('frontend/images/home/onepay.jpg')}}"--}}
                                    {{--                                                 alt=""/>--}}
                                    {{--                                            <div class="check"></div>--}}
                                    {{--                                        </div>--}}
                                    {{--                                    </div>--}}
                                    <input class="btn_3 send_order" type="button" name="send_order" value="Xác nhận">
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('javascript')
    <script>
        $(document).ready(function () {
            $('.choose').on('change', function () {
                var action = $(this).attr('id');
                var ma_id = $(this).val();
                var _token = $('input[name="_token"]').val();
                var result = '';

                if (action == 'city') {
                    result = 'province';
                } else {
                    result = 'wards';
                }
                $.ajax({
                    url: '{{url('/select-delivery')}}',
                    method: 'POST',
                    data: {action: action, ma_id: ma_id, _token: _token},
                    success: function (data) {
                        console.log(data)
                        $('#' + result).html(data);
                    }
                });
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.calculate_delivery').click(function () {
                var matp = $('.city').val();
                var maqh = $('.province').val();
                var xaid = $('.wards').val();
                var _token = $('input[name="_token"]').val();
                if (matp == '' && maqh == '' && xaid == '') {
                    alert('Làm ơn chọn để tính phí vận chuyển');
                } else {
                    $.ajax({
                        url: '{{url('/calculate-fee')}}',
                        method: 'POST',
                        data: {matp: matp, maqh: maqh, xaid: xaid, _token: _token},
                        success: function () {
                            location.reload();
                        }
                    });
                }
            });
        });
    </script>
    <script type="text/javascript">

        $(document).ready(function () {
            $('.send_order').click(function () {
                var shipping_email = $('#shipping_email').val();
                var shipping_name = $('#shipping_name').val();
                var shipping_address = $('#shipping_address').val();
                var shipping_phone = $('#shipping_phone').val();
                var shipping_notes = $('#shipping_notes').val();
                var shipping_method = $('input[name="payment_select"]:checked').val();
                var order_fee = $('.order_fee').val();
                var order_coupon = $('.order_coupon').val();
                var _token = $('input[name="_token"]').val();
                var total_after = $('.total_after').val();
                if (shipping_email == '') {
                    toastr["error"]("Tài khoản email người nhận không được bỏ trống");
                    return false;
                } else if (shipping_name == '') {
                    toastr["error"]("Tên người đặt không được bỏ trống");
                    return false;
                } else if (shipping_address == '') {
                    toastr["error"]("Địa chỉ nhận hàng không được bỏ trống");
                    return false;
                } else if (shipping_phone == '') {
                    toastr["error"]("Số điện thoại người nhận không được bỏ trống");
                    return false;
                } else if (typeof shipping_method === 'undefined' || shipping_method === '') {
                    toastr["error"]("Phương thức thanh toán không được bỏ trống");
                    return false;
                }
                swal({
                    title: "Xác nhận đơn hàng",
                    text: "Đơn hàng sẽ không được hoàn trả khi đặt,bạn có muốn đặt không?",
                    icon: "warning",
                    cancel: "Đóng,chưa mua",
                    buttons: ["Đóng,chưa mua", "Cảm ơn, Mua hàng"],
                    dangerMode: true,
                })
                    .then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                url: '{{url('/confirm-order')}}',
                                method: 'POST',
                                data: {
                                    shipping_email: shipping_email,
                                    total_after: total_after,
                                    shipping_name: shipping_name,
                                    shipping_address: shipping_address,
                                    shipping_phone: shipping_phone,
                                    shipping_notes: shipping_notes,
                                    _token: _token,
                                    order_fee: order_fee,
                                    order_coupon: order_coupon,
                                    shipping_method: shipping_method
                                },
                                success: function (data) {
                                    swal("Đơn hàng", "Đơn hàng của bạn đã được gửi thành công", "success");
                                    if (data) {
                                        window.location.replace(data);
                                    }
                                }
                            });

                            window.setTimeout(function () {
                                location.reload();
                            }, 3000);
                        } else {
                            swal("Đóng", "Đơn hàng chưa được gửi, làm ơn hoàn tất đơn hàng", "error");

                        }
                    });


            });
        });

    </script>

@endsection
