@extends('backend.admin_layout')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Trang chủ/</span> Thêm thư viện ảnh</h4>

        <!-- Basic Layout & Basic with Icons -->
        <div class="row">
            <!-- Basic Layout -->
            <div class="col-xxl">
                <div class="card mb-12">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Thêm thư viện ảnh</h5>
                    </div>
                    <form action="{{route('insert_gallery',['product_id'=> $product_id])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-3" align="right">

                            </div>
                            <div class="col-md-6">
                                <input type="file" accept="image/*" id="file" multiple  name="file[]" class="form-control">
                                <span id="error_gallery"></span>
                            </div>
                            <div class="col-md-3" >
                                <input type="submit" name="upload" value="Tải ảnh" class="btn btn-success">
                            </div>
                        </div>
                    </form>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="text" id="product_id" name="product_id" value="{{$product_id}}" hidden>
                            <div class="gallery_loading">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>Tên hình ảnh</th>
                                        <th>Ảnh</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">


                                    </tbody>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Basic with Icons -->
    </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function(){
            load_gallery();

            function load_gallery() {
                var product_id = $('#product_id').val();
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{route('select_gallery')}}",
                    method: 'POST',
                    data:{product_id: product_id,_token: _token},
                    success: function(data) {
                        $('.gallery_loading').html(data);
                    }
                })
            }
            $('#file').change(function() {
                var error = '';
                var file = $('#file')[0].files;

                if(file.length>5) {
                    error +='<p>Chỉ được chọn tối đa 5 ảnh </p>';
                } else if(file.length === '') {
                    error +='<p>Không được bỏ trống ảnh</p>';
                } else if (file.size >2000000 ) {
                    error +='<p>Không được chọn kích ảnh lớn hơn 2MB</p>';
                }
                if(error == '') {

                } else {
                    $('#file').val('');
                    $('#error_gallery').html('<span class="text-danger">'+error+'</span>');
                    return false;
                }
            })
        })

        $(document).on('blur', '.edit_gallery_name',function() {
            var gallery_id = $(this).data('gallery_id');
            var gallery_text = $(this).text();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: "{{route('update_gallery_name')}}",
                method: 'POST',
                data:{gallery_id: gallery_id,gallery_text: gallery_text,_token:_token},
                success: function(data) {
                    debugger
                    $('#error_gallery').html('<span class="text-danger">Cập nhập tên ảnh thành công</span>');

                    load_gallery();

                }
            })
        })
        $(document).on('click', '.delete-gallery',function() {
            var gallery_id = $(this).data('gallery_id');
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: "{{route('delete_gallery_name')}}",
                method: 'POST',
                data:{gallery_id: gallery_id,_token:_token},
                success: function(data) {
                    debugger
                    $('#error_gallery').html('<span class="text-danger">Xóa tên ảnh thành công</span>');

                    load_gallery();

                }
            })
        })
    </script>
@endsection
