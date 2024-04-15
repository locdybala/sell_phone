<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> 0932023992</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> webextrasite.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->

    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="{{URL::to('/')}}"><img  style="width: 200px; height: 100%;" src="{{('/frontend/images/home/logo.png')}}" alt=""/></a>
                    </div>
                    <div class="btn-group pull-right">

                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">

                            <?php
                            $customer_id = Session::get('customer_id');
                            $shipping_id = Session::get('shipping_id');
                            if ($customer_id != NULL && $shipping_id == NULL){
                                ?>
                            <li><a href="{{URL::to('/checkout')}}"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>

                                <?php
                            }elseif($customer_id != NULL && $shipping_id != NULL){
                                ?>
                            <li><a href="{{URL::to('/payment')}}"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>
                                <?php
                            }else{
                                ?>
                            <li><a href="{{URL::to('/login-checkout')}}"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>
                                <?php
                            }
                            ?>


                            <li><a href="{{URL::to('/gio-hang')}}"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a></li>
                            <?php
                            $customer_id = Session::get('customer_id');
                            if ($customer_id != NULL){
                                ?>
                            <li><a href="{{route('history')}}"><i class="fa fa-bell"></i> Lịch sử mua hàng</a>
                            </li>
                                <?php
                            }
                            ?>
                            <?php
                            $customer_id = Session::get('customer_id');
                            if ($customer_id != NULL){
                                ?>
{{--                            <li><a href="{{route('logout_checkout')}}"><i class="fa fa-lock"></i> Đăng xuất</a>--}}
{{--                                <img width="15%" src="{{\Illuminate\Support\Facades\Session::get('customer_picture')}}" alt="">--}}
{{--                                --}}
{{--                                {{Session::get('customer_name')}}--}}
{{--                            </li>--}}
                            <style>
                                #login-user>li>a:hover{
                                    color: #1ddf61 !important;
                                }
                            </style>
                            <li class="dropdown"><a href="#"><i class="fa fa-users">  {{Session::get('customer_name')}}</i></a>
                                <ul style="background-color: #ffffff" role="menu" id="login-user" class="sub-menu">
                                        <li><a href="{{route('edit_customer',['id'=>Session::get('customer_id')])}}" style="color: #6E8192"><i class="fa fa-user"></i>Thông tin cá nhân</a></li>
                                    <li><a style="color: #6E8192" href="{{route('logout_checkout')}}"><i class="fa fa-lock"></i> Đăng xuất</a></li>
                                </ul>
                            </li>

                                <?php
                            }else{
                                ?>
                            <li><a href="{{URL::to('/login-checkout')}}"><i class="fa fa-lock"></i> Đăng nhập</a></li>
                                <?php
                            }
                            ?>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-7">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="{{URL::to('/')}}" class="active">Trang chủ</a></li>
                            <li class="dropdown"><a href="#">Danh mục<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    @foreach ($category as $category)
                                        <li><a href="{{ route('detailCategory',['id'=>$category->category_id]) }}">{{$category->category_name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#">Tin tức<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                @foreach ($categorypost as $categorypost)
                                    <li><a href="{{ route('detaiCategoryPost',['slug'=>$categorypost->cate_post_slug]) }}">{{$categorypost->cate_post_name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li><a href="{{URL::to('/gio-hang')}}">Giỏ hàng</a></li>
                            <li><a href="{{route('contact')}}">Liên hệ</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-5">
                    <form action="{{route('search')}}" method="POST">
                        {{csrf_field()}}
                        <div class="search_box pull-right">
                            <input type="text" name="keywords_submit" placeholder="Tìm kiếm sản phẩm"/>
                            <input type="submit" style="margin-top:0;color:#666" name="search_items"
                                   class="btn btn-primary btn-sm" value="Tìm kiếm">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
</header>
