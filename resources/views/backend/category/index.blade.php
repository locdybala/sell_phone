@extends('backend.admin_layout')
@section('content')

    <section class="pcoded-main-container">
        <div class="pcoded-content">
            <!-- [ breadcrumb ] start -->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10">Quản lý danh mục sản phẩm</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i
                                            class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="#!">Danh mục</a></li>
                                <li class="breadcrumb-item"><a href="#!">Danh sách danh mục</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->
            <!-- [ Main Content ] start -->
            <div class="row">

                <!-- [ stiped-table ] start -->
                <div class="col-xl-12">
                    <div class="card">
                        @include('backend.components.notification');
                        <div class="card-header">
                            <h5>Danh sách danh mục</h5>
                            <div>
                                <a href="{{ route('add_category') }}"
                                   class="btn btn-sm mt-2 btn-success mb-2">Thêm danh mục</a>
                            </div>
                        </div>
                        <div class="card-body table-border-style">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên danh mục</th>
                                        <th>Mô tả</th>
                                        <th>Tình trạng</th>
                                        <th>Thao tác</th>
                                    </tr>
                                    </thead>
                                    <tbody>
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
                                                        <a href="{{ route('unactive_category',['id'=>$category->category_id]) }}"
                                                           class="badge badge-success">Kích hoạt</a>
                                                    </td>
                                                @else
                                                    <td>
                                                        <a href="{{ route('active_category',['id'=>$category->category_id]) }}"
                                                           class="badge badge-warning">Không kích hoạt</a>
                                                    </td>

                                                @endif
                                                <td>


                                                    <a class="btn btn-sm btn-warning"
                                                       href="{{ route('updateCategory',['id'=>$category->category_id]) }}"
                                                    ><i class="bx bx-edit-alt me-1"></i> Sửa</a
                                                    >
                                                    <form method="POST" action="">
                                                        @csrf
                                                        @method('delete')
                                                        <a onclick="return confirm('Bạn có muốn xóa danh mục này không?')"
                                                           href="{{ route('deleteCategory',['id'=>$category->category_id]) }}"
                                                           class="btn btn-sm btn-danger"><i class="bx bx-trash me-1">
                                                                Xóa</i></a>
                                                    </form>
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
                    </div>
                </div>
                <!-- [ stiped-table ] end -->
            </div>
            <!-- [ Main Content ] end -->
        </div>
    </section>
@endsection
