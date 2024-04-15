@extends('backend.admin_layout')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Trang chủ /</span> Danh sách nhận xét</h4>
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
        <div class="notify">

        </div>
        <div class="card">
            <h5 class="card-header">Danh sách nhận xét</h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Duyệt</th>
                        <th>Tên người gửi</th>
                        <th>Bình luận</th>
                        <th>Ngày gửi</th>
                        <th>Sản phẩm</th>
                        <th>Thao tác</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @if ($comments)
                        @foreach ($comments as $comment)
                            <tr>
                                @if ($comment->comment_status == 0)

                                    <td>
                                        <a href="{{ route('active_comment',['id'=>$comment->comment_id]) }}"><span
                                                class="badge bg-label-primary me-1">Duyệt</span></a></td>
                                @else
                                    <td><a href="{{ route('unactive_comment',['id'=>$comment->comment_id]) }}"><span
                                                class="badge bg-label-warning me-1">Bỏ duyệt</span></a></td>

                                @endif

                                <td><strong>{{$comment->comment_name}}</strong></td>
                                <td>{{$comment->comment}}
                                    <br>
                                    <span style="color: #9853fd;">Trả lời:</span>
                                    <ul>
                                        @foreach($replycoments as $replycom)
                                            @if($replycom->comment_parent == $comment->comment_id)
                                                <li style="list-style-type: decimal; color: #9853fd;margin: 5px ;">
                                                    {{$replycom->comment}}
                                                </li>
                                            @endif
                                        @endforeach

                                    </ul>
                                    <br>
                                    @if($comment->comment_status == 1)
                                        <form >
                                            @csrf
                                            <textarea class="form-control mb-2" name="" id="reply_comment_{{$comment->comment_id}}" cols="30"
                                                      rows="2"></textarea>
                                            <button type="button" data-product_id="{{$comment->product_id}}"
                                                    data-comment_id="{{$comment->comment_id}}"
                                                    class="btn-reply_comment btn btn-xs btn-warning">Trả lời
                                            </button>
                                        </form>
                                    @endif
                                </td>
                                <td>{{$comment->comment_date}}</td>
                                <td><a href="{{route('detailProduct',['id' => $comment->product_id])}}"
                                       target="_blank">{{$comment->product->product_name}}</a></td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">

                                            <form method="POST" action="">
                                                @csrf
                                                @method('delete')
                                                <a onclick="return confirm('Bạn có muốn xóa nhận xét này không?')"
                                                   href="" class="dropdown-item"><i class="bx bx-trash me-1">
                                                        Xóa</i></a>
                                            </form>
                                            {{--                                            <form action="#" method="POST">--}}
                                            {{--                                                @csrf--}}
                                            {{--                                                @method('DELETE')--}}
                                            {{--                                                <a class="dropdown-item show_confirm"--}}
                                            {{--                                                   href="{{ route('deletecomment',['id'=>$comment->comment_id]) }}"--}}
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
@section('js')
    <script>
        $(document).ready(function () {
            $('.btn-reply_comment').click(function () {

                var comment_id = $(this).data('comment_id');
                var reply_comment = $('#reply_comment_'+comment_id).val();
                var product_id = $(this).data('product_id');
                var _token = $('input[name="_token"]').val();

                $.ajax({
                    url:"{{ route('reply_comment')}}",
                    method:"POST",
                    data:{reply_comment:reply_comment,comment_id:comment_id,product_id:product_id,_token:_token},
                    success:function(){
                        $('#reply_comment_'+comment_id).val(' ');
                        location.reload();
                        $('.notify').html('<div class="alert alert-success">Trả lời bình luận thành công</div>')
                    }

                });

            })
        });
    </script>

@endsection
