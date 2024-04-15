@extends('backend.admin_layout')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Trang chủ/</span> Sửa khách hàng</h4>
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
                        <h5 class="mb-0">Sửa khách hàng</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('updateCustomer',['id'=>$customer->customer_id,'admin'=>1]) }}" method="POST">
                            @csrf
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label"  for="basic-default-name">Mã khách hàng</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" readonly value="{{ $customer->customer_id }}" id="basic-default-name" name="customer_id"  />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label"  for="basic-default-name">Tên khách hàng</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="{{ $customer->customer_name }}" id="basic-default-name" name="customer_name"  />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label"  for="basic-default-name">Địa chỉ email</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="{{ $customer->customer_email }}" id="basic-default-name" name="customer_email"  />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label"  for="basic-default-name">Ngày sinh</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" value="{{ $customer->customer_birthday }}" id="basic-default-name" name="customer_birthday"  />
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label"  for="basic-default-name">Số điện thoại </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="{{ $customer->customer_phone }}" id="basic-default-name" name="customer_phone"  />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label"  for="basic-default-name">Địa chỉ</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="{{ $customer->customer_address }}" id="basic-default-name" name="customer_address"  />
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


