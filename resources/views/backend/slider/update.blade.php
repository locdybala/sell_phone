@extends('backend.admin_layout')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Trang chủ/</span> Thêm slider</h4>

        <!-- Basic Layout & Basic with Icons -->
        <div class="row">
            <!-- Basic Layout -->
            <div class="col-xxl">
                <div class="card mb-12">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Thêm slider</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{  route('update_slider',['id'=>$slider->slider_id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Tên slider</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="{{ $slider->slider_name }}" id="basic-default-name" name="name"
                                    />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Ảnh</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" id="basic-default-name" name="image"
                                    />
                                    <img class="input-rounded mt-2" src="{{ URL::to('/upload/slider/'.$slider->slider_image) }}" height="150" width="150" alt="">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-message">Mô tả</label>
                                <div class="col-sm-10">
                                  <textarea
                                      id="ckeditor"
                                      class="form-control" name="description"
                                      placeholder="Mô tả slider"
                                  >{{ $slider->slider_desc }}</textarea>
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
