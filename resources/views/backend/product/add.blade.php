@extends('backend.admin_layout')
@section('content')
    <style>
        .bootstrap-tagsinput .tag {
            margin-right: 2px;
            color: white;
        }

        .label-info {
            background-color: #5bc0de;
        }
    </style>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Trang chủ/</span> Thêm sản phẩm</h4>

        <!-- Basic Layout & Basic with Icons -->
        <div class="row">
            <!-- Basic Layout -->
            <div class="col-xxl">
                <div class="card mb-12">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Thêm sản phẩm</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{route('addProduct')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Tên sản phẩm</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="basic-default-name" name="name"
                                           placeholder="John Doe"/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Danh mục sản phẩm</label>
                                <div class="col-sm-10">
                                    <select id="defaultSelect" name="category_id" class="form-select">
                                        <option>---Chọn danh mục---</option>
                                        @foreach ($category as $category)
                                            <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Thương hiệu sản phẩm</label>
                                <div class="col-sm-10">
                                    <select id="defaultSelect" name="brand_id" class="form-select">
                                        <option>---Chọn thương hiệu---</option>
                                        @foreach ($brand as $brand)
                                            <option value="{{ $brand->brand_id }}">{{ $brand->brand_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Tag sản phẩm</label>
                                <div class="col-sm-10">
                                    <input type="text" data-role="tagsinput" class="form-control" id="product_tags" name="product_tags"
                                           />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Số lượng</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="basic-default-name" name="product_quantity"
                                           placeholder="Nhập số lượng"/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Nội dung</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="basic-default-name" name="product_content"
                                           placeholder="John Doe"/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Giá</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="basic-default-name" name="price"
                                           placeholder="1.000.000 "/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Ảnh</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" id="basic-default-name" name="image"
                                           />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-message">Mô tả</label>
                                <div class="col-sm-10">
                                  <textarea
                                      id="ckeditor"
                                      class="form-control" name="description"
                                      placeholder="Mô tả sản phẩm"
                                  ></textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Trạng thái</label>
                                <div class="col-sm-10">
                                    <select id="defaultSelect" name="status" class="form-select">
                                        <option>---- Trạng thái ----</option>
                                        <option value="1">Hiển thị</option>
                                        <option value="2">Ẩn</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Thêm</button>
                                </div>
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
        CKEDITOR.replace('ckeditor');
    </script>
@endsection
