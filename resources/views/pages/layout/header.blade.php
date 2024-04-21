<header>
    @php
        $customer_id = Session::get('customer_id');
        $shipping_id = Session::get('shipping_id');
    @endphp
    <!-- Header Start -->
    <div class="header-area">
        <div class="main-header header-sticky">
            <div class="container-fluid">
                <div class="menu-wrapper">
                    <!-- Logo -->
                    <div class="logo">
                        <a href="{{URL::to('/')}}"><img src="{{asset('frontend/assets/img/logo/logo.png')}}" alt=""></a>
                    </div>
                    <!-- Main-menu -->
                    <div class="main-menu d-none d-lg-block">
                        <nav>
                            <ul id="navigation">
                                <li><a href="{{URL::to('/')}}">Trang chủ</a></li>
                                <li class="hot"><a href="{{route('shop')}}">Danh mục</a>
                                    <ul class="submenu">
                                        @foreach ($category as $category)
                                            <li>
                                                <a href="{{ route('detailCategory',['id'=>$category->category_id]) }}"> {{$category->category_name}}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li class="hot"><a href="#">Thương hiệu</a>
                                    <ul class="submenu">
                                        @foreach ($brand as $brand)
                                            <li>
                                                <a href="{{ route('detailBrand',['id'=>$brand->brand_id]) }}">{{$brand->brand_name}}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>

                                <li><a href="{{route('categoryPostIndex')}}">Tin tức</a>
                                </li>
                                <li><a href="{{URL::to('/gio-hang')}}">Giỏ hàng</a></li>
                                <li><a href="{{route('contact')}}">Liên hệ</a></li>

                                @if ($customer_id != NULL)
                                    <li><a href="{{route('history')}}">Lịch sử mua hàng</a></li>
                                @endif
                                @if ($customer_id != NULL && $shipping_id == NULL)

                                    <li>
                                        <a href="{{URL::to('/checkout')}}"> Thanh toán</a>
                                    </li>

                                @elseif($customer_id != NULL && $shipping_id != NULL)

                                    <li><a href="{{URL::to('/payment')}}"> Thanh toán</a>
                                    </li>
                                @else
                                    <li><a href="{{URL::to('/login-checkout')}}"> Thanh toán</a>
                                    </li>
                                @endif
                            </ul>
                        </nav>
                    </div>
                    <!-- Header Right -->
                    <div class="header-right">
                        <ul>
                            {{--                            <li>--}}
                            {{--                                <form action="{{route('search')}}" method="POST">--}}
                            {{--                                    {{csrf_field()}}--}}
                            {{--                                    <div class="search_box pull-right">--}}
                            {{--                                        <input type="text" name="keywords_submit" placeholder="Tìm kiếm sản phẩm"/>--}}
                            {{--                                        <input type="submit" style="margin-top:0;color:#666" name="search_items"--}}
                            {{--                                               class="btn btn-primary btn-sm" value="Tìm kiếm">--}}
                            {{--                                    </div>--}}
                            {{--                                </form>--}}
                            {{--                            </li>--}}
                            <li>
                                <div class="nav-search search-switch">
                                    <span class="flaticon-search"></span>
                                </div>
                            </li>
                            <li><a href="{{URL::to('/gio-hang')}}"><span class="flaticon-shopping-cart"></span></a></li>
                            @if ($customer_id != NULL)
                                <li><a href=""><span class="flaticon-user"> {{Session::get('customer_name')}}</span></a>
                                    <ul class="submenu">
                                        <li><a href="{{route('edit_customer',['id'=>Session::get('customer_id')])}}"><span class="flaticon-user">Thông tin cá nhân</a>
                                        </li>
                                        <li><a href="{{route('logout_checkout')}}"><span class="flaticon-user"> Đăng xuất</a></li>
                                    </ul>
                                </li>
                            @else
                                <li><a href="{{URL::to('/login-checkout')}}"><span class="flaticon-user"> Đăng nhập</span></a></li>

                            @endif
                        </ul>
                    </div>
                </div>
                <!-- Mobile Menu -->
                <div class="col-12">
                    <div class="mobile_menu d-block d-lg-none"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>



