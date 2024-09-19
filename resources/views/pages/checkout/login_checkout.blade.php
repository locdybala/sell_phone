@extends('layout')
@section('content')
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Đăng nhập hệ thống</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="{{URL::to('/')}}">Trang Chủ</a></li>
            <li class="breadcrumb-item active text-white">Đăng nhập</li>
        </ol>
    </div>
    <!-- Checkout Page Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-md-12 col-lg-6 col-xl-6 ">
                    <div class="login_part_text text-center ">
                        <div class="login_part_text_iner">
                            <h2>Bạn là khách hàng mới?</h2>
                            <p>Bạn muốn sử dụng trang web và mua hàng trực tuyến</p>
                            <a href="{{route('registerCustomer')}}" class="btn btn-primary">Tạo mới tài khoản</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6 col-xl-6">
                    <h3>Chào mừng trở lại ! <br>
                        Vui lòng đăng nhập ngay bây giờ</h3>
                    @if(session()->has('success'))
                        <div class="alert alert-success alert-block">
                            {{session()->get('success')}}
                            @php session()->forget('success') @endphp
                        </div>
                    @elseif(session()->has('error'))
                        <div class="alert alert-danger alert-block">
                            {{session()->get('error')}}
                            @php session()->forget('error') @endphp
                        </div>
                    @endif
                    <form action="{{route('login_customer')}}" method="POST">
                        {{csrf_field()}}
                        <div class="form-item">
                            <label for="email_account" class="form-label my-3">Tài khoản email<sup>*</sup></label>
                            <input type="email" id="email_account" name="email_account" class="form-control"
                                   placeholder="Nhập tài khoản email" value="{{old('email_account')}}">
                        </div>
                        <div class="form-item">
                            <label for="password_account" class="form-label my-3">Mật khẩu <sup>*</sup></label>
                            <input type="password" id="password_account" name="password_account"
                                   class="form-control" placeholder="Nhập mật khẩu"
                                   value="{{old('password_account')}}">
                        </div>
                        <div class="form-check my-3">
                            <input type="checkbox" class="form-check-input" id="Account-1" name="Accounts"
                                   value="Accounts">
                            <label class="form-check-label" for="Account-1">Ghi nhớ đăng nhập</label>
                        </div>

                        <button type="submit" id="btnSubmit" value="submit"
                                class="btn border-warning text-uppercase text-primary">Đăng nhập
                        </button>
                        <a class="lost_pass" href="{{route('forgot_pass')}}">Quên mật khẩu?</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <script type="text/javascript">

        $("#btnSubmit").click(function () {
            var password_account = $("#password_account").val();
            var email_account = $("#email_account").val();

            if (email_account == '') {
                toastr.error("Không được để trống email đăng nhập");
                return false;
            }
            // Kiểm tra mật khẩu
            else if (password_account == '') {
                toastr.error("Không được để trống mật khẩu");
                return false;
            }
            return true; // Nếu hợp lệ, tiếp tục form submit
        });
    </script>

@endsection
