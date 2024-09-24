<header>
    @php
        $customer_id = Session::get('customer_id');
        $shipping_id = Session::get('shipping_id');
    @endphp
    <!-- Header Start -->
    <!-- Spinner Start -->
    <div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar start -->
    <div class="container-fluid fixed-top">
        <div class="container topbar bg-primary d-none d-lg-block">
            <div class="d-flex justify-content-between">
                <div class="top-info ps-2">
                    <small class="me-3"><i class="fas fa-map-marker-alt me-2 text-secondary"></i> <a href="#" class="text-white">123 Hà Nội, Việt Nam</a></small>
                    <small class="me-3"><i class="fas fa-envelope me-2 text-secondary"></i><a href="#" class="text-white">vatlieusinhhoc@gmail.com</a></small>
                </div>
                <div class="top-link pe-2">
                    <a href="#" class="text-white"><small class="text-white mx-2">Chào mừng bạn đến với cửa hàng trực tuyến của chúng tôi !</small></a>
                </div>
            </div>
        </div>
        <div class="container px-0">
            <nav class="navbar navbar-light bg-white navbar-expand-xl">
                <a href="index.html" class="navbar-brand"><h1 class="text-primary display-6">King Bio</h1></a>
                <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars text-primary"></span>
                </button>
                <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                    <div class="navbar-nav mx-auto">
                        <a href="{{URL::to('/')}}" class="nav-item nav-link active">Trang chủ</a>
                        <div class="nav-item dropdown">
                            <a href="{{route('shop')}}" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Sản phẩm</a>
                            <div class="dropdown-menu m-0 bg-secondary rounded-0">
                                @foreach ($category as $category)
                                    <li>
                                        <a href="{{ route('detailCategory',['id'=>$category->category_id]) }}" class="dropdown-item">{{$category->category_name}}</a>
                                    </li>
                                @endforeach
                            </div>
                        </div>
                        <a href="{{url('pages/gioithieu')}}" class="nav-item nav-link">Giới thiệu</a>
                        <a href="{{route('categoryPostIndex')}}" class="nav-item nav-link">Tin tức</a>
                        <a href="{{route('contact')}}" class="nav-item nav-link">Liên hệ</a>
                        @if ($customer_id != NULL && $shipping_id == NULL)
                            <a href="{{URL::to('/checkout')}}" class="nav-item nav-link">Thanh toán</a>
                        @elseif($customer_id != NULL && $shipping_id != NULL)
                            <a href="{{URL::to('/payment')}}" class="nav-item nav-link">Thanh toán</a>
                        @else
                            <a href="{{URL::to('/login-checkout')}}" class="nav-item nav-link">Thanh toán</a>
                        @endif
                    </div>
                    <div class="d-flex m-3 me-0">
                        <button class="btn-search btn border border-secondary btn-md-square rounded-circle bg-white me-4" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fas fa-search text-primary"></i></button>
                        <a href="{{route('cart')}}" class="position-relative me-4 my-auto">
                            <i class="fa fa-shopping-bag fa-2x"></i>
                            <span
                                class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-dark px-1"
                                style="top: -5px; left: 15px; height: 20px; min-width: 20px;">
                                    {{ Session::has('cart') && is_array(Session::get('cart')) ? count(Session::get('cart')) : 0 }}
                            </span>
                        </a>
                        @if ($customer_id != NULL)
                            <div class="nav-item dropdown">
                                <a href="{{route('shop')}}" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fas fa-user fa-2x" style="margin-right: 5px"></i>{{ Session::get('customer_name') }}</a>
                                <div class="dropdown-menu m-0 bg-secondary rounded-0">
                                        <li>
                                            <a href="{{ URL::to('/edit-customer/' . Session::get('customer_id')) }}" class="dropdown-item">Thông tin tài khoản</a>
                                        </li>
                                    <li>
                                        <a href="{{route('logout')}}" class="dropdown-item">Đăng xuất</a>
                                    </li>
                                </div>
                            </div>
                        @else
                            <a href="{{URL::to('/login-checkout')}}" class="my-auto">
                                <i class="fas fa-user fa-2x"></i>
                                <span>Đăng nhập</span>
                            </a>
                        @endif
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Modal Search Start -->
    <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tìm kiếm theo từ khoá</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center">
                    <div class="input-group w-75 mx-auto d-flex">
                        <input type="search" class="form-control p-3" placeholder="Nhập từ khoá tìm kiếm" aria-describedby="search-icon-1">
                        <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>



