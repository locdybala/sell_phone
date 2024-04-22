@extends('layout')
@section('content')
    <div class="slider-area ">
        <div style="min-height: 300px !important;" class="single-slider slider-height2 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>Đăng nhập hệ thống</h2>
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
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_text text-center">
                        <div class="login_part_text_iner">
                            <h2>Bạn là khách hàng mới?</h2>
                            <p>Bạn muốn sử dụng trang web và mua hàng trực tuyến</p>
                            <a href="{{route('registerCustomer')}}" class="btn_3">Tạo mới tài khoản</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_form">
                        <div class="login_part_form_iner">
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
                                <div class="col-md-12 form-group p_star">
                                    <label for="email_account">Họ tên <span class="required">*</span></label>
                                    <input type="email" id="email_account" name="email_account" class="form-control"
                                           placeholder="Nhập tài khoản email" value="{{old('email_account')}}">

                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <label for="email_account">Mật khẩu <span class="required">*</span></label>
                                    <input type="password" id="password_account" name="password_account"
                                           class="form-control" placeholder="Nhập mật khẩu"
                                           value="{{old('password_account')}}">

                                </div>
                                <div class="col-md-12 form-group">
                                    <div class="creat_account d-flex align-items-center">
                                        <input type="checkbox" id="f-option" name="selector">
                                        <label for="f-option">Ghi nhớ đăng nhập</label>
                                    </div>
                                    <button type="submit" value="submit" id="btnSubmit" class="btn_3">
                                        Đăng nhập
                                    </button>
                                    <a class="lost_pass" href="{{route('forgot_pass')}}">Quên mật khẩu?</a>
                                </div>
                            </form>
                            <ul style="margin: 10px; padding: 0">
                                <li style="display: inline; margin: 5px" class="list-login">
                                    <a href="{{route('login_customer_google')}}">
                                        <img width="8%" src="{{asset('/frontend/images/google.png')}}" alt="">
                                        <span style="margin-left: 5px">Đăng nhập bằng google</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('javascript')
    <script type="text/javascript">

        $("#btnSubmit").click(function () {
            var password_account = $("#password_account").val();
            var email_account = $("#email_account").val();

            if (email_account == '') {
                toastr["error"]("Không được để trống email đăng nhập");
                return false;
            } else if (password_account == '') {
                toastr["error"]("Không được để trống mật khẩu");
                return false;
            }
            return true;
        });
    </script>

@endsection
