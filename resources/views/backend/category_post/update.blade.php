@extends('backend.admin_layout')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Trang chủ/</span> Sửa danh mục bài viết</h4>
        @php
            $message=Session::get('message');
            if($message){
                echo '<div class="alert alert-danger">
                          '.$message.'
                        </div>';
                Session::put('message', null);

                                        }
        @endphp
            <!-- Basic Layout & Basic with Icons -->
        <div class="row">
            <!-- Basic Layout -->
            <div class="col-xxl">
                <div class="card mb-6">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Sửa danh mục bài viết</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('editCategoryPost',['id'=>$category->cate_post_id]) }}" method="POST">
                            @csrf
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label"  for="basic-default-name">Mã danh mục bài viết</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" readonly value="{{ $category->cate_post_id }}" id="basic-default-name"   />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label"  for="basic-default-name">Tên danh mục bài viết</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="{{ $category->cate_post_name }}" id="basic-default-name" name="name"  />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label"  for="basic-default-name">Slug</label>
                                <div class="col-sm-10">
                                    <input type="text" id="slug" class="form-control" value="{{ $category->cate_post_slug }}" id="basic-default-name" name="slug"  />
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-message">Mô tả</label>
                                <div class="col-sm-10">
                      <textarea
                          id="ckeditor"
                          class="form-control" name="description"
                          placeholder="Mô tả danh mục bài viết"
                      >{{ $category->cate_post_description }}</textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Trạng thái</label>
                                <div class="col-sm-10">
                                    <select id="defaultSelect" name="status" class="form-select">
                                    @if($category->status==0)
                                        <option selected value="0">Ẩn</option>
                                        <option value="1">Hiện thị</option>
                                    @else
                                        <option  value="0">Ẩn</option>
                                        <option selected value="1">Hiện thị</option>
                                    @endif
                                </select>
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Sửa</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xxl">
            </div>
            <!-- Basic with Icons -->
        </div>
    </div>
@endsection
@section('js')
    <script>
        CKEDITOR.replace('ckeditor');
    </script>
@endsection
