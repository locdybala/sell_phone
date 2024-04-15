@extends('layout')
@section('content')

    <section style="margin-top: 20px !important;" id="form"><!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="signup-form"><!--sign up form-->
                        <h2>Đăng ký</h2>
                        @if(session()->has('success'))
                            <div class="alert alert-success alert-block">
                                {{session()->get('success')}}
                            </div>
                        @elseif(session()->has('error'))
                            <div class="alert alert-danger alert-block">
                                {{session()->get('error')}}
                            </div>
                        @endif
                        <form action="{{route('addCustomer')}}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="email">Họ và tên</label>
                                <input type="text" name="customer_name" placeholder="Họ và tên"/>
                            </div>
                            <div class="form-group">
                                <label for="email">Tài khoản</label>
                                <input type="email" name="customer_email" placeholder="Địa chỉ email"/>

                            </div>
                            <div class="form-group">
                                <label for="email">Mật khẩu</label>
                                <input type="password" name="customer_password" placeholder="Mật khẩu"/>

                            </div>
                            <div class="form-group">
                                <label for="email">Ngày sinh</label>
                                <input type="date" name="customer_birthday" placeholder="Ngày sinh"/>

                            </div><div class="form-group">
                                <label for="email">Số điện thoại</label>
                                <input type="number" name="customer_phone" maxlength="11" placeholder="Phone"/>

                            </div>
                            <div class="form-group">
                                <label for="email">Địa chỉ</label>
                                <input type="text" name="customer_address" placeholder="Địa chỉ"/>
                            </div>
                            <div style="display: flex">
                                <button type="submit" class="btn btn-default ">Đăng ký</button>
                                <a href="{{route('loginCustomer')}}" style="padding-left: 10px;padding-top: 8px;">Đăng nhập</a>
                            </div>
                        </form>
                    </div><!--/sign up form-->
                </div>
            </div>
        </div>
    </section><!--/form-->

@endsection
