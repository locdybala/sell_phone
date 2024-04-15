@extends('layout')
@section('content')

    <section style="margin-top: 20px !important;" id="form"><!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-1">
                    <div class="login-form"><!--login form-->
                        <h2>Lấy lại mật khẩu</h2>
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
                            <div class="form-group">
                                <label for="email">Tài khoản</label>
                                <input type="email"  id="email_account" name="email_account"  placeholder="Nhập tài khoản email" readonly value="{{$email}}">
                            </div>
                            <div class="form-group">
                                <label for="password">Mật khẩu mới</label>
                                <input type="password"  id="password_account" name="password_account"  placeholder="Nhập mật khẩu" value="{{old('password_account')}}">
                            </div>
                            <input type="hidden"  value="{{$token}}" name="token">

                            <div style="display: flex">
                                <button type="submit" class="btn btn-default ">Lưu</button>
                            </div>

                        </form>
                    </div><!--/login form-->
                </div>
            </div>
        </div>
    </section><!--/form-->

@endsection
