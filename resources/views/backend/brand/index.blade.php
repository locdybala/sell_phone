@extends('backend.admin_layout')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Trang chủ /</span> Danh sách thương hiệu</h4>
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
        <a href="{{ route('add_brand') }}" class="btn btn-success mb-2">Thêm thương hiệu</a>
        <div class="card">
            <h5 class="card-header">Danh sách thương hiệu</h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên thương hiệu</th>
                        <th>Mô tả</th>
                        <th>Tình trạng</th>
                        <th>Thao tác</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @php $i= 0; @endphp
                    @if ($brand)
                        @foreach ($brand as $brand)
                            @php $i++; @endphp
                            <tr>
                                <td>{{$i}}</td>

                                <td><strong>{{$brand->brand_name}}</strong></td>
                                <td>{!! $brand->brand_desc !!}</td>

                                @if ($brand->brand_status==1)

                                    <td>
                                        <a href="{{ route('unactive_brand',['id'=>$brand->brand_id]) }}"><span
                                                class="badge bg-label-primary me-1">Kích hoạt</span></a></td>
                                @else
                                    <td><a href="{{ route('active_brand',['id'=>$brand->brand_id]) }}"><span
                                                class="badge bg-label-warning me-1">Không kích hoạt</span></a></td>

                                @endif
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">

                                            <a class="dropdown-item"
                                               href="{{ route('updateBrand',['id'=>$brand->brand_id]) }}"
                                            ><i class="bx bx-edit-alt me-1"></i> Sửa</a
                                            >
                                            <form method="POST" action="">
                                                @csrf
                                                @method('delete')
                                                <a onclick="return confirm('Bạn có muốn xóa thương hiệu này không?')" href="{{ route('deleteBrand',['id'=>$brand->brand_id]) }}" class="dropdown-item " ><i class="bx bx-trash me-1"> Xóa</i></a>
                                            </form>
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
