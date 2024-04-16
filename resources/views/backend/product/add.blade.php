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
    <section class="pcoded-main-container">
        <div class="pcoded-content">
            <!-- [ breadcrumb ] start -->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10">Thêm sản phẩm</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i
                                            class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="#!">sản phẩm</a></li>
                                <li class="breadcrumb-item"><a href="#!">Thêm sản phẩm</a></li>
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
                            <h5>Thêm mới sản phẩm</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{route('addProduct')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="floating-label" for="name">Tên sản phẩm</label>
                                            <input type="text" class="form-control" required id="name" name="name"
                                                   placeholder="Nhập tên sản phẩm"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="floating-label" for="category_id">Danh mục sản phẩm </label>
                                            <select id="category_id" name="category_id" class="form-control">
                                                <option>---Chọn danh mục---</option>
                                                @foreach ($category as $category)
                                                    <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="floating-label" for="brand_id">Thương hiệu sản phẩm</label>
                                            <select id="brand_id" name="brand_id" class="form-control">
                                                <option>---Chọn thương hiệu---</option>
                                                @foreach ($brand as $brand)
                                                    <option value="{{ $brand->brand_id }}">{{ $brand->brand_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="floating-label" for="name">Giá</label>
                                            <input type="number" class="form-control" id="basic-default-name" name="price"
                                                   placeholder="1.000.000 "/>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="floating-label" for="name">Số lượng</label>
                                            <input type="text" class="form-control" id="basic-default-name" name="product_quantity"
                                                   placeholder="Nhập số lượng"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="floating-label" for="name">Tag sản phẩm</label>
                                            <input type="text" data-role="tagsinput" class="form-control" id="product_tags" name="product_tags"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="floating-label" for="name">Ảnh</label>
                                            <input type="file" class="form-control" id="basic-default-name" name="image"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="floating-label" for="name">Nội dung</label>
                                            <input type="text" class="form-control" id="basic-default-name" name="product_content"
                                                   placeholder="Nội dung sản phẩm"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="floating-label" for="description">Mô tả</label>
                                            <textarea
                                                id="ckeditor"
                                                class="form-control" name="description"
                                                placeholder="Mô tả sản phẩm"
                                            ></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="floating-label" for="status">Trạng thái</label>
                                            <select id="status" name="status" class="form-control">
                                                <option value="1">Hiển thị</option>
                                                <option value="2">Ẩn</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Thêm</button>
                                            <a href="/admin/product/all_product" class="btn btn-default">Huỷ</a>

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
    </script>
@endsection
