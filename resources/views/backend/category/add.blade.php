@extends('backend.admin_layout')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Trang chủ/</span> Thêm danh mục</h4>

    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
      <!-- Basic Layout -->
      <div class="col-xxl">
        <div class="card mb-6">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Thêm danh mục</h5>
          </div>
          <div class="card-body">
            <form action="{{route('addCategory')}}" method="POST">
                @csrf
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Tên danh mục</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" required id="basic-default-name" name="name" placeholder="Nhập tên danh mục" />
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-message">Mô tả</label>
                <div class="col-sm-10">
                  <textarea
                    id="ckeditor"
                    class="form-control" name="description"
                    placeholder="Mô tả danh mục" required
                  ></textarea>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Trạng thái</label>
                <div class="col-sm-10">
                    <select id="validationDefault04" name="status" class="form-select">
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
