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
                                <h5 class="m-b-10">Sửa trang</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i
                                            class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="#!">Quản lý trang</a></li>
                                <li class="breadcrumb-item"><a href="#!">Sửa trang</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->
            <!-- [ Main Content ] start -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Sửa trang</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('update_pages',['id'=>$pages->id]) }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="floating-label" for="id-category">Mã trang <span class="required">(*)</span></label>
                                            <input type="text" class="form-control" readonly value="{{ $pages->id }}" id="basic-default-name" name="id"  />
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="floating-label" for="name">Tên trang <span class="required">(*)</span></label>
                                            <input type="text" class="form-control" required id="name" name="name"
                                                   value="{{ $pages->name }}"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="floating-label" for="name">Slug <span class="required">(*)</span></label>
                                            <input type="text" class="form-control" required id="slug" name="slug"
                                                   value="{{ $pages->slug }}"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="floating-label" for="description">Mô tả</label>
                                            <textarea
                                                id="ckeditor"
                                                class="form-control" name="content"
                                                placeholder="Mô tả trang" required
                                            >{!!  $pages->content  !!}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <button type="submit" id="btnSubmit" class="btn btn-primary">Sửa</button>
                                            <a href="/admin/pages/all_pages" class="btn btn-default">Huỷ</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- [ form-element ] start -->
            </div>
            <!-- [ Main Content ] end -->

        </div>
    </section>
    @endsection
@section('js')
    <script>
        CKEDITOR.replace('ckeditor');
        $("#btnSubmit").click(function () {
            var name = $("#name").val();
            var slug = $("#slug").val();
            var content = $("#content").val();

            if (name == '') {
                toastr["error"]("Tên trang không được bỏ trống");
                return false;
            } else if (slug == '') {
                toastr["error"]("Slug không được bỏ trống");
                return false;
            } else if (content == '') {
                toastr["error"]("Nội dung không được bỏ trống");
                return false;
            }
            return true;
        });
    </script>
@endsection
