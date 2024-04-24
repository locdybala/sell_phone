@extends('layout')
@section('content')
    <div class="slider-area ">
        <div style="min-height: 300px !important;" class="single-slider slider-height2 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>Quên mật khẩu</h2>
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
                    <div class="login_part_form">
                        <div class="login_part_form_iner">
                            <h3>Bạn quên mật khẩu <br>
                                Vui lòng điền đúng địa chỉ email của bạn</h3>
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
                            <form action="{{route('send_mail_forgot_pass')}}" method="POST">
                                {{csrf_field()}}
                                <div class="col-md-12 form-group p_star">
                                    <label for="email_account">Nhập email để lấy lại mật khẩu<span class="required">*</span></label>
                                    <input type="email" id="email_account" name="email_account" class="form-control"
                                           placeholder="Nhập tài khoản email" value="{{old('email_account')}}">

                                </div>

                                <div class="col-md-12 form-group">
                                    <button type="submit" value="submit" id="btnSubmit" class="genric-btn danger">
                                        Lấy lại mật khẩu
                                    </button>
                                    <a class="lost_pass" href="{{route('login')}}">Đăng nhập</a>
                                </div>
                            </form>
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
            var email_account = $("#email_account").val();

            if (email_account == '') {
                toastr["error"]("Không được để trống email");
                return false;
            }
            return true;
        });
    </script>

@endsection
