@extends('backend.admin_layout')
@section('content')
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
            <h5 class="card-header">Danh sách danh mục</h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    <thead>
                    <tr>

                        <th>Thứ tự</th>
                        <th>Mã đơn hàng</th>
                        <th>Ngày tháng đặt hàng</th>
                        <th>Tình trạng đơn hàng</th>

                        <th style="width:30px;"></th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @php
                        $i = 0;
                    @endphp
                    @if ($order)
                        @foreach ($order as $order)
                            @php
                                $i++;
                            @endphp
                            <tr>
                                <td><i>{{$i}}</i></td>
                                <td>{{ $order->order_code }}</td>
                                <td>{{ $order->created_at }}</td>


                                @if ($order->order_status==1)

                                    <td>
                                        <span
                                            class="badge bg-label-primary me-1">Đơn hàng mới</span></td>
                                @elseif($order->order_status== 3)
                                    <td>
                                        <span
                                            class="badge bg-label-danger me-1">Đơn hàng bị hủy</span></td>
                                @else
                                    <td><span
                                            class="badge bg-label-warning me-1">Đã xử lý</span></td>

                                @endif
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a href="{{route('view_order',['order_code'=> $order->order_code])}}" class="dropdown-item">
                                                <i class="bx bx-edit-alt me-1"></i> Chi tiết</a>

                                            <a onclick="return confirm('Bạn có chắc là muốn xóa danh mục này ko?')" href="{{URL::to('/delete-order/'.$order->order_code)}}" class="dropdown-item">
                                                <i class="bx bx-trash me-1"> Xóa</i>
                                            </a>
                                        </div>
                                    </div>
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
