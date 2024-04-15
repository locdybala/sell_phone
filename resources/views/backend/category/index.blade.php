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
        <a href="{{ route('add_category') }}" class="btn btn-success mb-2">Thêm danh mục</a>
        <div class="card">
            <h5 class="card-header">Danh sách danh mục</h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên danh mục</th>
                        <th >Mô tả</th>
                        <th>Tình trạng</th>
                        <th>Thao tác</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @php $i=0; @endphp
                    @if ($category)
                        @foreach ($category as $category)
                            @php $i++; @endphp
                            <tr>
                                <td>{{$i}}</td>

                                <td><strong>{{$category->category_name}}</strong></td>
                                <td>{!! $category->category_desc !!}</td>

                                @if ($category->category_status==1)

                                    <td>
                                        <a href="{{ route('unactive_category',['id'=>$category->category_id]) }}"><span
                                                class="badge bg-label-primary me-1">Kích hoạt</span></a></td>
                                @else
                                    <td><a href="{{ route('active_category',['id'=>$category->category_id]) }}"><span
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
                                               href="{{ route('updateCategory',['id'=>$category->category_id]) }}"
                                            ><i class="bx bx-edit-alt me-1"></i> Sửa</a
                                            >
                                            <form method="POST" action="">
                                                @csrf
                                                @method('delete')
                                                <a onclick="return confirm('Bạn có muốn xóa danh mục này không?')" href="{{ route('deleteCategory',['id'=>$category->category_id]) }}" class="dropdown-item" ><i class="bx bx-trash me-1"> Xóa</i></a>
                                            </form>
{{--                                            <form action="#" method="POST">--}}
{{--                                                @csrf--}}
{{--                                                @method('DELETE')--}}
{{--                                                <a class="dropdown-item show_confirm"--}}
{{--                                                   href="{{ route('deleteCategory',['id'=>$category->category_id]) }}"--}}
{{--                                                ><i class="bx bx-trash me-1"></i> Xóa</a--}}
{{--                                                >--}}
{{--                                            </form>--}}
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
