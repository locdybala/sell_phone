@extends('layout')
@section('content')
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Lấy lại mật khẩu</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="{{URL::to('/')}}">Trang Chủ</a></li>
            <li class="breadcrumb-item active text-white">Đổi mật khẩu</li>
        </ol>
        <!-- Checkout Page Start -->
    </div>
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-3"></div>
                <div class="col-md-12 col-lg-6 col-xl-6">
                    <h3 style="text-align: center">Thay đổi mật khẩu mơi</h3>
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
                    @php
                        $token = $_GET['token'];
                        $email = $_GET['email'];
                    @endphp
                    <form action="{{route('update_pass')}}" method="POST">
                        {{csrf_field()}}
                        <div class="form-item">
                            <label for="email_account" class="form-label my-3">Tài khoản email<sup>*</sup></label>
                            <input type="email" id="email_account" name="email_account" class="form-control"
                                   placeholder="Nhập tài khoản email" value="{{$email}}">
                        </div>
                        <div class="form-item">
                            <label for="email_account" class="form-label my-3">Mật khẩu mới<sup>*</sup></label>
                            <input type="password" id="password_account" name="password_account" class="form-control"
                                   placeholder="Nhập mật khẩu mới">
                        </div>
                        <input type="hidden" value="{{$token}}" name="token">
                        <div class="form-item mt-3">
                            <button type="submit" value="submit" id="btnSubmit" class="btn btn-success">
                                Lưu
                            </button>
                            <a class="lost_pass" href="{{route('login')}}">Đăng nhập</a>
                        </div>
                    </form>
                    <div class="col-lg-3"></div>

                </div>
            </div>
        </div>
    </div>
    <section style="padding: 100px 0px" class="login_part section_padding ">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-3"></div>
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_form">
                        <div class="login_part_form_iner">
                            <h3>Thay đổi mật khẩu mới</h3>
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
                            @php
                                $token = $_GET['token'];
                                $email = $_GET['email'];
                            @endphp
                            <form action="{{route('update_pass')}}" method="POST">
                                {{csrf_field()}}
                                <div class="col-md-12 form-group p_star">
                                    <label for="email_account">Tài khoản<span class="required">*</span></label>
                                    <input type="email" readonly id="email_account" name="email_account"
                                           class="form-control"
                                           placeholder="Nhập tài khoản email" value="{{$email}}">

                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <label for="password_account">Mật khẩu mới<span class="required">*</span></label>
                                    <input type="password" id="password_account" name="password_account"
                                           class="form-control"
                                           placeholder="Nhập mật khẩu mới">

                                </div>
                                <input type="hidden" value="{{$token}}" name="token">
                                <div class="col-md-12 form-group">
                                    <button type="submit" value="submit" id="btnSubmit" class="genric-btn danger">
                                        Lưu
                                    </button>
                                    <a class="lost_pass" href="{{route('login')}}">Đăng nhập</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3"></div>
            </div>
        </div>
    </section>

@endsection

@section('javascript')
    <script type="text/javascript">

        $("#btnSubmit").click(function () {
            var password_account = $("#password_account").val();

            if (password_account == '') {
                toastr["error"]("Không được để trống mật khẩu");
                return false;
            }
            return true;
        });
    </script>

@endsection
