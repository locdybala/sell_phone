@extends('layout')
@section('content')
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Thay đổi thông tin</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="{{URL::to('/')}}">Trang Chủ</a></li>
            <li class="breadcrumb-item active text-white">Thay đổi thông tin</li>
        </ol>
    </div>
    <!-- Checkout Page Start -->
    <div class="container-fluid fruite py-5">
        <div class="container py-5">
            <div class="row g-4">
                <div class="col-lg-12">
                    <div class="row g-4">
                        <div class="col-lg-3">
                            <div class="row g-4">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <h4>Quản lý tài khoản</h4>
                                        <ul class="list-unstyled fruite-categorie">
                                            <li>
                                                <div class="d-flex justify-content-between fruite-name">
                                                    <a href="{{URL::to('/edit-customer/' . Session::get('customer_id'))}}"><i
                                                            class="fas fa-apple-alt me-2"></i>Thông tin tài khoản
                                                    </a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex justify-content-between fruite-name">
                                                    <a href="{{route('history')}}"><i
                                                            class="fas fa-apple-alt me-2"></i>Lịch sử mua hàng
                                                    </a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex justify-content-between fruite-name">
                                                    <a href="{{route('logout')}}"><i
                                                            class="fas fa-apple-alt me-2"></i>Đăng xuất
                                                    </a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <h3>Thay đổi thông tin khách hàng</h3>
                            @if(session()->has('message'))
                                <div class="alert alert-success">
                                    {!! session()->get('message') !!}
                                </div>
                                {{ session()->forget('message') }} <!-- Xóa thông báo -->
                            @elseif(session()->has('error'))
                                <div class="alert alert-danger">
                                    {!! session()->get('error') !!}
                                </div>
                                {{ session()->forget('error') }} <!-- Xóa thông báo -->
                            @endif
                            <form action="{{route('addCustomer')}}" method="POST" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-md-12 col-lg-6">
                                        <div class="form-item w-100">
                                            <label for="customer_name" class="form-label my-3">Họ tên <sup>*</sup></label>
                                            <input type="text" id="customer_name" name="customer_name"
                                                   class="form-control" value="{{$customer->customer_name}}"
                                                   placeholder="Họ và tên">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-6">
                                        <div class="form-item w-100">
                                            <label for="customer_name" class="form-label my-3">Email <sup>*</sup></label>
                                            <input type="email" value="{{$customer->customer_email}}" id="customer_email"
                                                   name="customer_email"
                                                   class="form-control" placeholder="Nhập tài khoản email">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-item">
                                    <label for="customer_name" class="form-label my-3">Mật khẩu <sup>*</sup></label>
                                    <input type="password" id="password_account" name="password_account" class="form-control"
                                           placeholder="Nhập mật khẩu" value="{{old('password_account')}}">
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-lg-6">
                                        <div class="form-item w-100">
                                            <label for="customer_name" class="form-label my-3">Ngày sinh <sup>*</sup></label>
                                            <input type="date" id="customer_birthday" name="customer_birthday"
                                                   class="form-control" value="{{$customer->customer_birthday}}"
                                                   placeholder="Ngày sinh">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-6">
                                        <div class="form-item w-100">
                                            <label for="customer_name" class="form-label my-3">Số điện thoại
                                                <sup>*</sup></label>
                                            <input type="text" id="customer_phone" name="customer_phone"
                                                   class="form-control" placeholder="Số điện thoại"
                                                   value="{{$customer->customer_phone}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-item">
                                    <label for="customer_name" class="form-label my-3">Avatar</label>
                                    <input type="file" id="customer_avatar" name="customer_avatar" class="form-control">
                                    @if($customer->customer_avatar)
                                        <img style="width: 100px; height: 100px"
                                             src="{{asset('upload/customer/' . $customer->customer_avatar)}}" alt="">
                                    @else
                                        <p>Chưa có ảnh</p>
                                    @endif
                                </div>
                                <div class="form-item">
                                    <label for="customer_name" class="form-label my-3">Địa chỉ <sup>*</sup></label>
                                    <input type="text" id="customer_address" name="customer_address"
                                           class="form-control" value="{{$customer->customer_address}}" placeholder="Địa chỉ">
                                </div>
                                <div class="form-item">
                                    <button type="submit" id="btnSubmit"
                                            class="btn btn-primary my-3">Sửa
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <script type="text/javascript">

        $("#btnSubmit").click(function () {
            var customer_name = $("#customer_name").val();
            var customer_email = $("#customer_email").val();
            var customer_birthday = $("#customer_birthday").val();
            var customer_phone = $("#customer_phone").val();
            var customer_address = $("#customer_address").val();
            if (customer_name == '') {
                toastr["error"]("Không được để trống họ và tên?");
                return false;
            } else if (customer_email == '') {
                toastr["error"]("Không được để trống địa chỉ email?");
                return false;
            } else if (customer_birthday == '') {
                toastr["error"]("Không được để trống ngày sinh?");
                return false;
            } else if (customer_phone == '') {
                toastr["error"]("Không được để trống số điện thoại?");
                return false;
            } else if (customer_address == '') {
                toastr["error"]("Không được để trống địa chỉ?");
                return false;
            }
            return true;

        });
    </script>

@endsection
