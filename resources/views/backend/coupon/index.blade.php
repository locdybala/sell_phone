@extends('backend.admin_layout')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Trang chủ /</span> Danh sách mã giảm giá</h4>
        @php
            $message=Session::get('message');

            if($message){
                echo '<div class="alert alert-success">
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
        <a href="{{ route('add_coupon') }}" class="btn btn-success mb-2">Thêm mã giảm giá</a>

        <div class="card">
            <h5 class="card-header">Danh sách mã giảm giá</h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Tên mã giảm giá</th>
                        <th>Mã giảm giá</th>
                        <th>Ngày bắt đầu</th>
                        <th>Ngày kết thúc</th>
                        <th>Số lượng giảm giá</th>
                        <th>Điều kiện giảm giá</th>
                        <th>Số giảm</th>
                        <th>Thời hạn</th>
                        <th>Tình trạng</th>

                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @if ($coupon)
                        @foreach ($coupon as $cou)
                            <tr>
                                <td>{{ $cou->coupon_name }}</td>
                                <td>{{ $cou->coupon_code }}</td>
                                <td>{{$cou->coupon_date_start}}</td>
                                <td>{{$cou->coupon_date_end}}</td>
                                <td>{{ $cou->coupon_time }}</td>
                                <td><span class="text-ellipsis">
              <?php
                                        if ($cou->coupon_condition == 1){
                                            ?>
                Giảm theo %
                <?php
                                        }else{
                                            ?>
                Giảm theo tiền
                <?php
                                        }
                                            ?>
            </span>
                                </td>
                                <td><span class="text-ellipsis">
              <?php
                                        if ($cou->coupon_condition == 1){
                                            ?>
                Giảm {{$cou->coupon_number}} %
                <?php
                                        }else{
                                            ?>
                Giảm {{$cou->coupon_number}} k
                <?php
                                        }
                                            ?>
            </span></td>
                                <td><?php
                                    if ($cou->coupon_date_end < $today){
                                        ?>
                                    <span style="color: red">Hết hạn</span>
                                        <?php
                                    }else{
                                        ?>
                                    <span style="color: green">Còn hạn</span>
                                        <?php
                                    }
                                        ?></td>
                                <td><?php
                                    if ($cou->coupon_status == 1){
                                        ?>
                                    <span style="color: green">Đang kích hoạt</span>
                                        <?php
                                    }else{
                                        ?>

                                    <span style="color: red">Đã khóa</span>

                                        <?php
                                    }
                                        ?></td>
                                <td>
                                    <a href="{{ route('send_coupon',['id'=> $cou->coupon_id]) }}" class="btn btn-sm btn-xs btn-success mb-2">Gửi mã khách thường</a>
                                    <a href="{{ route('send_coupon_vip',['id'=> $cou->coupon_id]) }}" class="btn btn-sm btn-xs btn-success mb-2">Gửi mã khách vip</a>
                                    <a onclick="return confirm('Bạn có chắc là muốn xóa mã này ko?')"
                                       href="{{route('deletecoupon',['id'=> $cou->coupon_id])}}"
                                       class="active styling-edit"
                                       ui-toggle-class="">
                                        <i class="fa fa-times text-danger text">Xóa</i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <td>Không có dữ liệu</td>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
        <!--/ Hoverable Table rows -->
    </div>
@endsection
