@extends('backend.admin_layout')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Trang chủ /</span> Danh sách danh mục bài viết
        </h4>
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
        <a href="{{ route('add_PostCategory') }}" class="btn btn-success mb-2">Thêm danh mục bài viết</a>
        <div class="card">
            <h5 class="card-header">Danh sách danh mục bài viết</h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên danh mục</th>
                        <th>Hiển Thị</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @php $i =0;  @endphp
                    @if ($category)
                        @foreach ($category as $category)
                            @php
                                $i++;
                            @endphp
                            <tr>
                                <td>{{$i}}</td>

                                <td>{{$category->cate_post_name}}</td>
                                @if ($category->cate_post_status==1)
                                    <td>
                                        <a href="{{ route('unactive_category',['id'=>$category->cate_post_id]) }}"><span
                                                class="badge bg-label-primary me-1">Kích hoạt</span></a></td>
                                @else
                                    <td><a href="{{ route('active_category',['id'=>$category->cate_post_id]) }}"><span
                                                class="badge bg-label-warning me-1">Không kích hoạt</span></a></td>

                                @endif
                                <td>
                                    <form action="#" method="POST">
                                        <a href="{{ route('updatecategory_post',['id'=>$category->cate_post_id]) }}"
                                           class="btn btn-primary">Sửa</a>

                                        @csrf
                                        @method('DELETE')
                                        <a onclick="return confirm('Bạn có muốn xóa danh mục này không')"
                                           href="{{ route('deleteCategoryPost',['id'=>$category->cate_post_id]) }}"
                                           class="btn btn-danger">Xóa</a>
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
        <!--/ Hoverable Table rows -->
    </div>
@endsection
