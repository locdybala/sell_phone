@extends('backend.admin_layout')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Trang chủ/</span> Thêm mã giảm giá</h4>

        <!-- Basic Layout & Basic with Icons -->
        <div class="row">
            <!-- Basic Layout -->
            <div class="col-xxl">
                <div class="card mb-12">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Thêm mã giảm giá</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{route('addcoupon')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Tên mã giảm giá</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="basic-default-name" name="coupon_name"
                                           placeholder="Tên sự kiện giảm giá"/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Mã giảm giá</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="basic-default-name" name="coupon_code"
                                           placeholder="SD20021"/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Ngày bắt đầu</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" id="basic-default-name" name="stardate"
                                           placeholder="SD20021"/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Ngày kết thúc</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" id="basic-default-name" name="enddate"
                                           placeholder="SD20021"/>
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Số lượng mã</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="basic-default-name" name="coupon_time"
                                           placeholder="10 "/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Tính năng mã</label>
                                <div class="col-sm-10">
                                    <select id="defaultSelect" name="coupon_condition" class="form-select">
                                        <option>---Chọn loại giảm giá---</option>
                                        <option value="1">Giảm theo phần trăm</option>
                                        <option value="2">Giảm theo số tiền</option>

                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Nhập số % hoặc tiền giảm</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="basic-default-name" name="coupon_number"
                                           placeholder="10 "/>
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
