@extends('backend.admin_layout')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Trang chủ /</span> Danh sách sản phẩm</h4>
        @php
            $message=Session::get('message');

            if($message){
                echo '<div class="alert alert-danger">
                          '.$message.'
                        </div>';
                Session::put('message', null);

                                 }
        @endphp

        @php
            $success=Session::get('success');
            if($success){
            echo '<div class="alert alert-success">
                 '.$success.'
               </div>';
            Session::put('success', null);}
        @endphp
        {{--        <a href="{{ route('add_order') }}" class="btn btn-success mb-2">Thêm danh mục</a>--}}
        <div class="card">
            <h5 class="card-header">Danh sách sản phẩm</h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    <thead>
                    <tr>

                        <th>Tên khách hàng</th>
                        <th>Số điện thoại</th>
                        <th>Email</th>

                        <th style="width:30px;"></th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr>
                        <td>{{$customer->customer_name}}</td>
                        <td>{{$customer->customer_phone}}</td>
                        <td>{{$customer->customer_email}}</td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
        <!--/ Hoverable Table rows -->
    </div>

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Trang chủ /</span> Danh sách danh mục</h4>
        @php
            $message=Session::get('message');

            if($message){
                echo '<div class="alert alert-danger">
                          '.$message.'
                        </div>';
                Session::put('message', null);

                                 }
        @endphp

        @php
            $success=Session::get('success');
            if($success){
            echo '<div class="alert alert-success">
                 '.$success.'
               </div>';
            Session::put('success', null);}
        @endphp
        {{--        <a href="{{ route('add_order') }}" class="btn btn-success mb-2">Thêm danh mục</a>--}}
        <div class="card">
            <h5 class="card-header">Danh sách sản phẩm</h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
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

                    <tr>

                        <td>{{$shipping->shipping_name}}</td>
                        <td>{{$shipping->shipping_address}}</td>
                        <td>{{$shipping->shipping_phone}}</td>
                        <td>{{$shipping->shipping_email}}</td>
                        <td>{{$shipping->shipping_notes}}</td>
                        <td>@if($shipping->shipping_method==0)
                                Chuyển khoản
                            @else
                                Tiền mặt
                            @endif</td>


                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
        <!--/ Hoverable Table rows -->
    </div>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Trang chủ /</span> Danh sách danh mục</h4>
        @php
            $message=Session::get('message');

            if($message){
                echo '<div class="alert alert-danger">
                          '.$message.'
                        </div>';
                Session::put('message', null);

                                 }
        @endphp

        @php
            $success=Session::get('success');
            if($success){
            echo '<div class="alert alert-success">
                 '.$success.'
               </div>';
            Session::put('success', null);}
        @endphp
        {{--        <a href="{{ route('add_order') }}" class="btn btn-success mb-2">Thêm danh mục</a>--}}
        <div class="card">
            <h5 class="card-header">Danh sách sản phẩm</h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th style="width:20px;">
                            <label class="i-checks m-b-none">
                                <input type="checkbox"><i></i>
                            </label>
                        </th>
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
                        $i = 0;
                        $total = 0;
                    @endphp
                    @foreach($order_details as $key => $details)

                        @php
                            $i++;
                            $subtotal = $details->product_price*$details->product_sales_quantity;
                            $total+=$subtotal;
                        @endphp
                        <tr class="color_qty_{{$details->product_id}}">

                            <td><i>{{$i}}</i></td>
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

                                @if($order_status!=2 && $order_status !=3 )

                                    <button class="btn btn-danger btn-sm update_quantity_order"
                                            data-product_id="{{$details->product_id}}" name="update_quantity_order">Cập
                                        nhật
                                    </button>

                                @endif

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
                    <tr>
                        <td colspan="6">
                            @foreach($order as $key => $or)
                                @if($or->order_status==1)
                                    <form>
                                        @csrf
                                        <select class="form-control order_details">
                                            <option value="">----Chọn hình thức đơn hàng-----</option>
                                            <option id="{{$or->order_id}}" selected value="1">Chưa xử lý</option>
                                            <option id="{{$or->order_id}}" value="2">Đã xử lý-Đã giao hàng</option>
{{--                                            <option id="{{$or->order_id}}" value="3">Hủy đơn hàng-tạm giữ</option>--}}
                                        </select>
                                    </form>
                                @elseif($or->order_status==2)
                                    <form>
                                        @csrf
                                        <select disabled class="form-control order_details">
                                            <option value="">----Chọn hình thức đơn hàng-----</option>
                                            <option id="{{$or->order_id}}" value="1">Chưa xử lý</option>
                                            <option id="{{$or->order_id}}" selected  value="2">Đã xử lý-Đã giao hàng
                                            </option>
{{--                                            <option id="{{$or->order_id}}" value="3">Hủy đơn hàng-tạm giữ</option>--}}
                                        </select>
                                    </form>

                                @else
                                    <form>
                                        @csrf
                                        <select class="form-control order_details" disabled>
                                            <option value="">----Chọn hình thức đơn hàng-----</option>
                                            <option id="{{$or->order_id}}" value="1">Chưa xử lý</option>
                                            <option id="{{$or->order_id}}" value="2">Đã xử lý-Đã giao hàng</option>
                                            <option id="{{$or->order_id}}" selected value="3">Hủy đơn hàng-tạm giữ
                                            </option>
                                        </select>
                                    </form>
                                    @endif

                            @endforeach


                        </td>
                    </tr>
                    </tbody>
                </table>
                <a class="btn btn-outline-secondary btn-sm m-2" target="_blank" href="{{route('print_order',['order_code' => $details->order_code])}}">In đơn
                    hàng</a>
            </div>
        </div>
        <!--/ Hoverable Table rows -->
    </div>
@endsection
@section('js')
    <script type="text/javascript">
        $('.order_details').change(function () {
            var order_status = $(this).val();
            var order_id = $(this).children(":selected").attr("id");
            var _token = $('input[name="_token"]').val();

            //lay ra so luong
            quantity = [];
            $("input[name='product_sales_quantity']").each(function () {
                quantity.push($(this).val());
            });
            //lay ra product id
            order_product_id = [];
            $("input[name='order_product_id']").each(function () {
                order_product_id.push($(this).val());
            });
            j = 0;
            for (i = 0; i < order_product_id.length; i++) {
                //so luong khach dat
                var order_qty = $('.order_qty_' + order_product_id[i]).val();
                //so luong ton kho
                var order_qty_storage = $('.order_qty_storage_' + order_product_id[i]).val();

                if (parseInt(order_qty) > parseInt(order_qty_storage)) {
                    j = j + 1;
                    if (j == 1) {
                        alert('Số lượng bán trong kho không đủ');
                        $('.order_details').val('1');
                    }
                    $('.color_qty_' + order_product_id[i]).css('background', 'rgb(228 61 61)');
                }
            }
            if (j == 0) {

                $.ajax({
                    url: '{{url('/admin/order/update-order-qty')}}',
                    method: 'POST',
                    data: {
                        _token: _token,
                        order_status: order_status,
                        order_id: order_id,
                        quantity: quantity,
                        order_product_id: order_product_id
                    },
                    success: function (data) {
                        alert('Thay đổi tình trạng đơn hàng thành công');
                        location.reload();
                    }
                });

            }

        });
    </script>
    <script type="text/javascript">
        $('.update_quantity_order').click(function () {
            var order_product_id = $(this).data('product_id');
            var order_qty = $('.order_qty_' + order_product_id).val();
            var order_code = $('.order_code').val();
            var _token = $('input[name="_token"]').val();

            $.ajax({
                url: '{{url('/admin/order/update-qty')}}',

                method: 'POST',

                data: {
                    _token: _token,
                    order_product_id: order_product_id,
                    order_qty: order_qty,
                    order_code: order_code
                },
                // dataType:"JSON",
                success: function (data) {

                    alert('Cập nhật số lượng thành công');

                    location.reload();


                }
            });

        });
    </script>
@endsection
