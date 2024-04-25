@extends('layout')
@section('content')
    <div class="slider-area ">
        <div style="min-height: 300px !important;" class="single-slider slider-height2 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>Thay đổi thông tin</h2>
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
                            <form action="{{route('updateCustomer',['id'=>$customer->customer_id,'admin'=>0])}}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="col-md-12 form-group p_star">
                                    <label for="customer_name">Họ tên <span class="required">*</span></label>
                                    <input type="text"  id="customer_name" name="customer_name"
                                           class="form-control" value="{{$customer->customer_name}}" placeholder="Họ và tên">

                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <label for="customer_name">Email <span class="required">*</span></label>
                                    <input type="email"  value="{{$customer->customer_email}}" id="customer_email" name="customer_email"
                                           class="form-control" placeholder="Nhập tài khoản email" >

                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <label for="customer_name">Mật khẩu</label>
                                    <input type="password"  id="password_account" name="password_account" class="form-control"  placeholder="Nhập mật khẩu">

                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <label for="customer_name">Avatar</label>
                                    <input type="file"  id="customer_avatar" name="customer_avatar" class="form-control"  >
                                    @if($customer->customer_avatar)
                                        <img style="width: 100px; height: 100px" src="{{asset('upload/customer/' . $customer->customer_avatar)}}"  alt="">
                                    @else
                                        <p>Chưa có ảnh</p>
                                    @endif
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <label for="customer_name">Ngày sinh <span class="required">*</span></label>
                                    <input type="date"  id="customer_birthday" name="customer_birthday"
                                           class="form-control" value="{{$customer->customer_birthday}}" placeholder="Ngày sinh">

                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <label for="customer_name">Số điện thoại <span class="required">*</span></label>
                                    <input type="text"  id="customer_phone" name="customer_phone"
                                           class="form-control" placeholder="Số điện thoại" value="{{$customer->customer_phone}}">

                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <label for="customer_name">Địa chỉ <span class="required">*</span></label>
                                    <input type="text"  id="customer_address" name="customer_address"
                                           class="form-control" value="{{$customer->customer_address}}" placeholder="Địa chỉ">

                                </div>
                                <div class="col-md-12 form-group">
                                    <button type="submit" value="submit" id="btnSubmit" class="genric-btn danger">
                                        Sửa
                                    </button>
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
            var customer_name =  $("#customer_name").val();
            var customer_email =  $("#customer_email").val();
            var customer_birthday =  $("#customer_birthday").val();
            var customer_phone =  $("#customer_phone").val();
            var customer_address =  $("#customer_address").val();
            if(customer_name == '') {
                toastr["error"]("Không được để trống họ và tên?");
                return false;
            } else if(customer_email == '') {
                toastr["error"]("Không được để trống địa chỉ email?");
                return false;
            }  else if(customer_birthday == '') {
                toastr["error"]("Không được để trống ngày sinh?");
                return false;
            } else if(customer_phone == '') {
                toastr["error"]("Không được để trống số điện thoại?");
                return false;
            } else if(customer_address == '') {
                toastr["error"]("Không được để trống địa chỉ?");
                return false;
            }
            return true;

        });
    </script>

@endsection
