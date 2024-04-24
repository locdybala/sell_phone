@extends('layout')
@section('content')
    <div class="slider-area ">
        <div style="min-height: 300px !important;" class="single-slider slider-height2 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>Lấy lại mật khẩu</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Area End-->
    <!--================login_part Area =================-->
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
                                    <input type="email" readonly id="email_account" name="email_account" class="form-control"
                                           placeholder="Nhập tài khoản email" value="{{$email}}">

                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <label for="password_account">Mật khẩu mới<span class="required">*</span></label>
                                    <input type="password" id="password_account" name="password_account" class="form-control"
                                           placeholder="Nhập mật khẩu mới">

                                </div>
                                <input type="hidden"  value="{{$token}}" name="token">
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
