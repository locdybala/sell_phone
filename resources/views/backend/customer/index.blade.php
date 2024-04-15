@extends('backend.admin_layout')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Trang chủ /</span> Danh sách khách hàng</h4>
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

        <div class="card">
            <h5 class="card-header">Danh sách khách hàng</h5>
            <div class="table-responsive ">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên khách hàng</th>
                        <th>Địa chỉ email</th>
                        <th>Ngày sinh</th>
                        <th>Số điện thoại</th>
                        <th>Địa chỉ</th>
                        <th>Thao tác</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @php $i = 0; @endphp
                    @if ($customer)
                        @foreach ($customer as $cus)
                            @php $i++; @endphp
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{ $cus->customer_name }}</td>
                                <td>{{ $cus->customer_email }}</td>
                                <td>{{$cus->customer_birthday}}</td>
                                <td>{{$cus->customer_phone}}</td>
                                <td>{{ $cus->customer_address }}</td>

                                <td>
                                    <a
                                        href="{{route('update_customer',['id'=>$cus->customer_id])}}"
                                        class="active btn btn-primary btn-xs btn-sm"
                                        ui-toggle-class="">
                                        Sửa
                                    </a>
                                    <a onclick="return confirm('Bạn có chắc là muốn xóa mã này ko?')"
                                       href=""
                                       class="active btn btn-danger btn-xs btn-sm"
                                       ui-toggle-class="">
                                        Xóa
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
