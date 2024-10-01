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
                        <div class="row">
                            <div class="col-md-12 col-lg-4">
                                <div class="form-item w-100">
                                    <label class="form-label my-3" for="">Chọn thành phố</label>
                                    <select name="city" id="city"
                                            class="form-select choose city">
                                        <option value="">--Chọn tỉnh thành phố--</option>
                                        @foreach($city as $key => $ci)
                                            <option @if(Session::get('selected_city') == $ci->matp) selected @endif value="{{$ci->matp}}">{{$ci->name_city}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-4">
                                <div class="form-item w-100">
                                    <label class="form-label my-3" for="exampleInputPassword1">Chọn quận huyện</label>
                                    <select name="province" id="province"
                                            class="form-select province choose">
                                        <option value="">--Chọn quận huyện--</option>
                                        @if(Session::get('selected_city'))
                                            @foreach($provinces as $province)
                                                <option @if(Session::get('selected_province') == $province->maqh) selected @endif value="{{$province->maqh}}">{{$province->name_quanhuyen}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-4">
                                <div class="form-item w-100">
                                    <label class="form-label my-3" for="exampleInputPassword1">Chọn xã phường</label>
                                    <select name="wards" id="wards"
                                            class="form-select wards">
                                        <option value="">--Chọn xã phường--</option>
                                        @if(Session::get('selected_province'))
                                            @foreach($wards as $ward)
                                                <option @if(Session::get('selected_wards') == $ward->xaid) selected @endif value="{{$ward->xaid}}">{{$ward->name_xaphuong}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-item">
                            <label class="form-label my-3">Địa chỉ nhận hàng<sup>*</sup></label>
                            <input type="text" class="form-control" id="address"
                                   name="address" value="" readonly>
                        </div>
                        <div class="form-item">
                            <label class="form-label my-3">Chi tiết địa chỉ<sup>*</sup></label>
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
                            <input type="hidden" name="order_fee" class="order_fee" value="25000">
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
                                        <td class=""></td>
                                        <td class=""></td>
                                        <td class="">
                                            <p class="mb-0 text-dark">Tổng tạm tính</p>
                                        </td>
                                        <td class="">
                                            <div class="py-3 border-bottom border-top">
                                                <p class="mb-0 text-dark">{{number_format($total,0,',','.')}}đ</p>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        @php
                                            $coupons = Session::get('coupon', []); // Gán mặc định là mảng rỗng nếu không có coupon
                                            $total_after_coupon = $total; // Khởi tạo giá trị ban đầu
                                        @endphp

                                        @if(!empty($coupons)) <!-- Kiểm tra nếu có coupon -->
                                        @foreach($coupons as $key => $cou)
                                            @if($cou['coupon_condition'] == 1)
                                                Mã giảm: {{$cou['coupon_number']}} %
                                                @php
                                                    $total_coupon = ($total * $cou['coupon_number']) / 100;
                                                @endphp
                                            @elseif($cou['coupon_condition'] == 2)
                                                Mã giảm: {{number_format($cou['coupon_number'], 0, ',', '.')}} k
                                                @php
                                                    $total_coupon = $cou['coupon_number'];
                                                @endphp
                                            @endif
                                        @endforeach
                                        @endif
                                        @php
                                            // Lấy giá trị fee từ session hoặc gán mặc định là 30000 nếu không có
                                            $priceFee = Session::get('fee', 30000);
                                            $total_after_fee = $total + $priceFee;
                                        @endphp
                                        <th scope="row">
                                        </th>
                                        <td class="">
                                            <p class="mb-0 text-dark py-4">Phí áp dụng</p>
                                        </td>
                                        <td colspan="2" class="">
                                            <div class="form-check text-start">
                                                <label class="form-check-label" for="Shipping-1">Phí ship</label>
                                            </div>
                                            @if(isset($total_coupon) && $total_coupon > 0)
                                            <div class="form-check text-start">
                                                <label class="form-check-label" for="Shipping-2">Giảm giá:</label>
                                            </div>
                                            @endif
                                        </td>
                                        <td class="">
                                            <div class="form-check text-start">
                                                <label class="form-check-label" for="Shipping-1">{{number_format($priceFee)}}đ</label>
                                            </div>
                                            @if(isset($total_coupon) && $total_coupon > 0)
                                            <div class="form-check text-start">
                                                <label class="form-check-label" for="Shipping-2">
                                                    - {{number_format($total_coupon)}}</label>
                                            </div>
                                            @endif
                                        </td>
                                    </tr>
                                    @php
                                        if(!Session::get('coupon')){
                                            $total_after = $total_after_fee;
                                        } else {
                                            $total_after = $total_after_fee - $total_coupon;
                                        }
                                    @endphp
                                    <tr>
                                        <th scope="row">
                                        </th>
                                        <td class="">
                                            <p class="mb-0 text-dark text-uppercase py-3">Tổng cộng</p>
                                        </td>
                                        <td class=""></td>
                                        <td class=""></td>
                                        <td class="">
                                            <div class="py-3 border-bottom border-top">
                                                <p class="mb-0 text-dark">{{number_format($total_after,0,',','.')}}đ </p>
                                                <input type="hidden" name="total_after" class="total_after"
                                                       value="{{$total_after}}">
                                            </div>
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                            <div class="row g-4 text-center align-items-center justify-content-center border-bottom">
                                <div class="col-12">
                                    <div class="form-check text-start my-3">
                                        <input checked type="radio" class="form-check-input bg-primary border-0"
                                               id="Transfer-1" name="payment_select" value="1">
                                        <label class="form-check-label" for="Transfer-1">Trả tiền mặt khi nhận hàng</label>
                                        <p id="text_note_1" style="display: none" class="text-start text-dark">Trả tiền mặt khi giao hàng.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-4 text-center align-items-center justify-content-center border-bottom">
                                <div class="col-12">
                                    <div class="form-check text-start my-3">
                                        <input type="radio" class="form-check-input bg-primary border-0"
                                               id="Payments-1" name="payment_select" value="2">
                                        <label class="form-check-label" for="Payments-1">Thanh toán qua VNPAY</label>
                                        <p id="text_note_2" style="display: none" class="text-start text-dark">Thực hiện thanh toán online qua app ngân hàng VNPAY</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-4 text-center align-items-center justify-content-center border-bottom">
                                <div class="col-12">
                                    <div class="form-check text-start my-3">
                                        <input type="radio" class="form-check-input bg-primary border-0"
                                               id="Paypal-1" name="payment_select" value="3">
                                        <label class="form-check-label" for="Paypal-1">Chuyển khoản ngân hàng</label>
                                        <p id="text_note_3" style="display: none" class="text-start text-dark">Thực hiện thanh toán vào ngay tài khoản ngân hàng của chúng tôi. Vui lòng sử dụng Mã đơn hàng của bạn trong phần Nội dung thanh toán. Đơn hàng sẽ được giao sau khi tiền đã chuyển.</p>
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
            var cityName = $('#city option:selected').text();
            var provinceName = $('#province option:selected').text();
            var wardsName = $('#wards option:selected').text();

            if($('#wards').val() != '') {
                $('#address').val(cityName + ', ' + provinceName + ', ' + wardsName);
            }
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
            $('#wards').change(function () {
                var matp = $('#city').val();
                var maqh = $('#province').val();
                var xaid = $('#wards').val();
                var _token = $('input[name="_token"]').val();

                if (matp === '' || maqh === '' || xaid === '') {
                    return; // Không làm gì nếu chưa chọn đủ
                }

                $.ajax({
                    url: '{{url('/calculate-fee')}}',
                    method: 'POST',
                    data: {matp: matp, maqh: maqh, xaid: xaid, _token: _token},
                    success: function (response) {
                        // Cập nhật phí vận chuyển trong form nếu cần
                        toastr["success"]("Phí vận chuyển đã được cập nhật!")
                        // Cập nhật giá trị địa chỉ
                        location.reload();

                    },
                    error: function () {
                        alert('Có lỗi xảy ra. Vui lòng thử lại.');
                    }
                });
            });
        });
    </script>
    <script type="text/javascript">

        $(document).ready(function () {
            $('.send_order').click(function () {
                debugger;

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
                var address = $('#address').val();

                // Kiểm tra thông tin
                if (shipping_email === '') {
                    toastr["error"]("Tài khoản email người nhận không được bỏ trống");
                    return false;
                } else if (shipping_name === '') {
                    toastr["error"]("Tên người đặt không được bỏ trống");
                    return false;
                } else if (shipping_address === '') {
                    toastr["error"]("Địa chỉ nhận hàng không được bỏ trống");
                    return false;
                } else if (shipping_phone === '') {
                    toastr["error"]("Số điện thoại người nhận không được bỏ trống");
                    return false;
                } else if (typeof shipping_method === 'undefined' || shipping_method === '') {
                    toastr["error"]("Phương thức thanh toán không được bỏ trống");
                    return false;
                }

                // Xác nhận đơn hàng
                swal({
                    title: "Xác nhận đơn hàng",
                    text: "Đơn hàng sẽ không được hoàn trả khi đặt, bạn có muốn đặt không?",
                    icon: "warning",
                    buttons: ["Đóng, chưa mua", "Cảm ơn, Mua hàng"],
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
                                    address: address,
                                    order_fee: order_fee,
                                    order_coupon: order_coupon,
                                    shipping_method: shipping_method
                                },
                                success: function (data) {
                                    swal("Đơn hàng", "Đơn hàng của bạn đã được gửi thành công", "success");

                                    if (data.order_code) {
                                        window.location.href = `{{ url('/success') }}/${data.order_code}`;
                                    } else {
                                        if (data) {
                                            window.location.replace(data);
                                        }
                                    }
                                },
                                error: function (xhr) {
                                    console.log(xhr.responseText);
                                    swal("Lỗi", "Có lỗi xảy ra, vui lòng thử lại!", "error");
                                }
                            });
                        } else {
                            swal("Đóng", "Đơn hàng chưa được gửi, làm ơn hoàn tất đơn hàng", "error");
                        }
                    });
            });
        });
        $("input[name='payment_select']:checked").each(function() {
            $('#text_note_' + $(this).val()).show();
        });

        // Xử lý sự kiện khi chọn ô radio
        $("input[name='payment_select']").change(function() {
            // Ẩn tất cả các ghi chú
            $("p[id^='text_note_']").hide();
            // Hiển thị ghi chú tương ứng với ô radio đã chọn
            $('#text_note_' + $(this).val()).show();
        });
    </script>

@endsection
