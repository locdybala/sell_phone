<footer>
    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5">
        <div class="container py-5">
            <div class="pb-4 mb-4" style="border-bottom: 1px solid rgba(226, 175, 24, 0.5) ;">
                <div class="row g-4">
                    <div class="col-lg-3">
                        <a href="#">
                            <h1 class="text-primary mb-0">King Bio</h1>
                            <p class="text-secondary mb-0">Sản phẩm chất lượng</p>
                        </a>
                    </div>
                    <div class="col-lg-6">

                    </div>
                    <div class="col-lg-3">
                        <div class="d-flex justify-content-end pt-3">
                            <a class="btn  btn-outline-secondary me-2 btn-md-square rounded-circle" href="https://www.youtube.com/"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle" href="http://www.facebook.com"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle" href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a>
                            <a class="btn btn-outline-secondary btn-md-square rounded-circle" href="https://www.youtube.com/"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <div class="footer-item">
                        <h4 class="text-light mb-3">Tại sao mọi người thích chúng tôi!</h4>
                        <p class="mb-4">Chúng tôi luôn nỗ lực mang lại trải nghiệm tốt nhất với chất lượng vượt trội
                            và sự hỗ trợ tận tình.
                            Đáp ứng và vượt qua mong đợi của khách hàng là cam kết của chúng tôi.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="d-flex flex-column text-start footer-item">
                        <h4 class="text-light mb-3">Hỗ trợ khách hàng</h4>
                        @foreach($pages as $page)
                            <a class="btn-link" href="{{route('pages', ['slug' => $page->slug])}}">{{$page->name}}</a>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="d-flex flex-column text-start footer-item">
                        <h4 class="text-light mb-3">Thông tin liên hệ </h4>
                        <a class="btn-link" href="">Địa chỉ CS1: 41A Phú Diễn, Bắc Từ Liêm, HN</a>
                        <a class="btn-link" href="">Địa chỉ CS2: 29 Trần Đại Nghĩa, Hai Bà Trưng, HN</a>
                        <a class="btn-link" href="">Điện thoại: 033.456.789 - 1800.6063</a>
                        <a class="btn-link" href="">Giấy CNĐKDN: 0313471857</a>
                        <a class="btn-link" href="">Cơ quan cấp: Phòng Đăng Ký Kinh Doanh - Sở Kế Hoạch Và Đầu Tư TP.HN</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-item">
                        <h4 class="text-light mb-3">Thông tin thêm</h4>
                        <p>HOTLINE: 1800 6063</p>
                        <p>Bảo hành: (028) 627 55711</p>
                        <p>Thanh toán online</p>
                        <img src="{{asset('frontend/img/payment.png')}}" class="img-fluid" alt="">
                        <h4 class="text-light mt-3">Thông tin thêm</h4>
                        <img src="{{asset('frontend/img/duocthongbao.png')}}" style="width: 150px; height: 57px" class="img-fluid" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Copyright Start -->
    <div class="container-fluid copyright bg-dark py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    <span class="text-light"><a href="#"><i class="fas fa-copyright text-light me-2"></i>KingBioweb.com</a>, Đã đăng ký bản quyền.</span>
                </div>
                <div class="col-md-6 my-auto text-center text-md-end text-white">
                    <!--/*** This template is free as long as you keep the below author’s credit link/attribution link/backlink. ***/-->
                    <!--/*** If you'd like to use the template without the below author’s credit link/attribution link/backlink, ***/-->
                    <!--/*** you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". ***/-->
                    Designed By <a class="border-bottom" href="https://htmlcodex.com">Code </a> Design By <a class="border-bottom" href="https://themewagon.com">Team CRM</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->
    <a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>
</footer>
