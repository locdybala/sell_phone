@extends('backend.admin_layout')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Trang chủ /</span> Danh sách phí vận chuyển</h4>
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
        <a href="{{ route('add_fee') }}" class="btn btn-success mb-2">Thêm phí vận chuyển</a>
        <div class="card">
            <h5 class="card-header">Danh sách phí vận chuyển</h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên thành phố</th>
                        <th>Tên quận huyện</th>
                        <th>Tên xã phường</th>
                        <th>Phí ship</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @php $i=0; @endphp
                    @if ($feeship)
                        @foreach ($feeship as $feeship)
                            @php $i++; @endphp
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{ optional($feeship->city)->name_city }}</td>
                                <td>{{ optional($feeship->province)->name_quanhuyen }}</td>
                                <td>{{ optional($feeship->wards)->name_xaphuong }}</td>
                                <td>{{number_format($feeship->fee_feeship)}}</td>
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
