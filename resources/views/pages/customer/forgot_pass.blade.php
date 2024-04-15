@extends('layout')
@section('content')

    <section style="margin-top: 20px !important;" id="form"><!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-1">
                    <div class="login-form"><!--login form-->
                        <h2>Quên mật khẩu</h2>
                        @if(session()->has('success'))
                            <div class="alert alert-success alert-block">
                                {{session()->get('success')}}
                                @php session()->forget('success') @endphp
                            </div>
                        @elseif(session()->has('message'))
                            <div class="alert alert-danger alert-block">
                                {{session()->get('message')}}
                                @php session()->forget('message') @endphp
                            </div>
                        @endif
                        <form action="{{route('send_mail_forgot_pass')}}" method="POST">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="email">Điền email để lấy lại mật khẩu</label>
                                <input type="email"  id="email_account" name="email_account"  placeholder="Nhập tài khoản email" value="{{old('email_account')}}">
                            </div>


                            <div style="display: flex">
                                <button type="submit" class="btn btn-default ">Lấy lại mật khẩu</button>
                            </div>

                        </form>
                    </div><!--/login form-->
                </div>
            </div>
        </div>
    </section><!--/form-->

@endsection
