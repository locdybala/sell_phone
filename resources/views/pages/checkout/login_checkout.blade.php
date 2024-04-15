@extends('layout')
@section('content')

    <section style="margin-top: 20px !important;" id="form"><!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-1">
                    <div class="login-form"><!--login form-->
                        <h2>Đăng nhập tài khoản</h2>
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
                            <div class="form-group">
                                <label for="email">Tài khoản</label>
                                <input type="email"  id="email_account" name="email_account"  placeholder="Nhập tài khoản email" value="{{old('email_account')}}">
                            </div>
                            <div class="form-group">
                                <label for="password">Mật khẩu</label>
                                <input type="password"  id="password_account" name="password_account"  placeholder="Nhập mật khẩu" value="{{old('password_account')}}">
                            </div>
                            <span>
								<input type="checkbox" class="checkbox">
								Ghi nhớ đăng nhập
							</span>
                            <span>
								<a href="{{route('forgot_pass')}}">Quên mật khẩu</a>
							</span>
                            <div style="display: flex">
                                <button type="submit" class="btn btn-default ">Đăng nhập</button>
                                <a href="{{route('registerCustomer')}}" style="width: 100px; height: 32px; margin-top: 30px; padding-left: 10px;"  >Đăng ký</a>
                            </div>

                        </form>
                        <ul style="margin: 10px; padding: 0">
                            <li style="display: inline; margin: 5px" class="list-login">
                                <a href="{{route('login_customer_google')}}">
                                    <img width="8%"  src="{{asset('/frontend/images/google.png')}}" alt="">
                                    <span style="margin-left: 5px">Đăng nhập bằng google</span>
                                </a>
                            </li>
                        </ul>
                    </div><!--/login form-->
                </div>
            </div>
        </div>
    </section><!--/form-->

@endsection
