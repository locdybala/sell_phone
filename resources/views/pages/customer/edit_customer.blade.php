@extends('layout')
@section('content')

    <section style="margin-top: 20px !important;" id="form"><!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="signup-form"><!--sign up form-->
                        <h2>Chỉnh sửa thông tin</h2>
                        @if(session()->has('success'))
                            <div class="alert alert-success alert-block">
                                {{session()->get('success')}}
                            </div>
                            {{session()->forget('success')}}
                        @elseif(session()->has('error'))
                            <div class="alert alert-danger alert-block">
                                {{session()->get('error')}}
                            </div>
                        @endif
                        <form action="{{route('updateCustomer',['id'=>$customer->customer_id,'admin'=>0])}}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="email">Họ và tên</label>
                                <input type="text" name="customer_name" required value="{{$customer->customer_name}}" placeholder="Họ và tên"/>
                            </div>
                            <div class="form-group">
                                <label for="email">Tài khoản</label>
                                <input type="email" name="customer_email" required value="{{$customer->customer_email}}" placeholder="Địa chỉ email"/>

                            </div>
                            <div class="form-group">
                                <label for="email">Mật khẩu</label>
                                <input type="password" name="customer_password" placeholder="Mật khẩu" required/>
                            </div>
                            <div class="form-group">
                                <label for="email">Ngày sinh</label>
                                <input type="date" name="customer_birthday" value="{{$customer->customer_birthday}}" required placeholder="Ngày sinh"/>

                            </div><div class="form-group">
                                <label for="email">Số điện thoại</label>
                                <input type="number" name="customer_phone" value="{{$customer->customer_phone}}" required maxlength="11" placeholder="Phone"/>

                            </div>
                            <div class="form-group">
                                <label for="email">Địa chỉ</label>
                                <input type="text" name="customer_address" value="{{$customer->customer_address}}"  placeholder="Địa chỉ" required/>
                            </div>
                            <div style="display: flex">
                                <button type="submit" class="btn btn-default ">Sửa</button>
                            </div>
                        </form>
                    </div><!--/sign up form-->
                </div>
            </div>
        </div>
    </section><!--/form-->

@endsection
