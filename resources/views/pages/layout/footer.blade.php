<!--::footer_part start::-->
<footer class="footer_part">
    <div class="container">
        <div class="row justify-content-around">
            <div class="col-sm-6 col-lg-3">
                <div class="single_footer_part">
                    <h4>Sản phẩm nổi bật</h4>
                    <ul class="list-unstyled">
                        <li><a href="#">Bàn ghế phòng khách</a></li>
                        <li><a href="#">Tủ quần áo</a></li>
                        <li><a href="#">Giường ngủ</a></li>
                        <li><a href="#">Đồ trang trí</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="single_footer_part">
                    <h4>Thông tin</h4>
                    <ul class="list-unstyled">
                        @foreach($pages as $pa)
                            @if($pa->slug == 'gioithieu')
                                <li><a href="{{ route('pages', ['slug' => $pa->slug]) }}">{{ $pa->name }}</a></li>
                            @endif
                        @endforeach
                        <li><a href="{{route('contact')}}">Liên hệ</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="single_footer_part">
                    <h4>Hỗ trợ khách hàng</h4>
                    <ul class="list-unstyled">
                        @foreach($pages as $page)
                            @if($page->slug != 'gioithieu')
                                <li><a href="{{ route('pages', ['slug' => $page->slug]) }}">{{ $page->name }}</a></li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="single_footer_part">
                    <h4>Đăng ký nhận tin</h4>
                    <p>Nhận thông tin khuyến mãi và sản phẩm mới nhất từ chúng tôi.</p>
                    <div id="mc_embed_signup">
                        <form target="_blank" action="#" method="get" class="subscribe_form relative mail_part">
                            <input type="email" name="email" id="newsletter-form-email" placeholder="Nhập email của bạn"
                                   class="placeholder hide-on-focus">
                            <button type="submit" name="submit" id="newsletter-submit"
                                    class="email_icon newsletter-submit button-contactForm">Đăng ký</button>
                            <div class="mt-10 info"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright_part">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="copyright_text">
                        <p>© <script>document.write(new Date().getFullYear());</script> Nội Thất Nhà Đẹp | Thiết kế bởi <a href="#">Đội ngũ của chúng tôi</a></p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="footer_icon social_icon">
                        <ul class="list-unstyled">
                            <li><a href="#" class="single_social_icon"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#" class="single_social_icon"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="#" class="single_social_icon"><i class="fab fa-youtube"></i></a></li>
                            <li><a href="#" class="single_social_icon"><i class="fab fa-tiktok"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--::footer_part end::-->
