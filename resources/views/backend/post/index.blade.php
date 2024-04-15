@extends('backend.admin_layout')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Trang chủ /</span> Danh sách bài viết</h4>
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
        <a href="{{ route('add_post') }}" class="btn btn-success mb-2">Thêm bài viết</a>
        <div class="card">
            <h5 class="card-header">Danh sách bài viết</h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên bài viết</th>
                        <th>Hình ảnh</th>
                        <th>Mô tả bài viết</th>
                        <th>Từ khóa bài viết</th>
                        <th>Danh mục bài viết</th>
                        <th>Hiển thị</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @php
                        $i=0;
                    @endphp
                    @if ($post)
                        @foreach ($post as $post)
                            @php $i++; @endphp
                            <tr>
                                <td>{{$i}}</td>
                                <td><strong>{{$post->post_title}}</strong></td>
                                <td><img src="/upload/post/{{ $post->post_image }}" style="width:150px;height:100px;"
                                         alt=""></td>
                                <td style="font-size: 14px;"><span style="display: block;
  width: 100px;
  overflow: hidden;
  white-space: nowrap;
  text-overflow: ellipsis;">{!!$post->post_description!!}</span></td>
                                <td>{!!  $post->meta_keywords  !!}</td>
                                <td>{{ optional($post->category)->cate_post_name    }}</td>

                                @if ($post->post_status==1)

                                    <td>
                                        <a href="{{ route('unactive_post',['id'=>$post->post_id]) }}"><span
                                                class="badge bg-label-primary me-1">Kích hoạt</span></a></td>
                                @else
                                    <td><a href="{{ route('active_post',['id'=>$post->post_id]) }}"><span
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
                                               href="{{ route('updatepost',['id'=>$post->post_id]) }}"
                                            ><i class="bx bx-edit-alt me-1"></i> Sửa</a
                                            >
                                            <form method="POST" action="">
                                                @csrf
                                                @method('delete')
                                                <a onclick="return confirm('Bạn có muốn xóa bài viết này không?')"
                                                   href="{{ route('deletePost',['id'=>$post->post_id]) }}"
                                                   class="dropdown-item"><i class="bx bx-trash me-1"> Xóa</i></a>
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
