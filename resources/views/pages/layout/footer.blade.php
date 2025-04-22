<!--::footer_part start::-->
<footer class="footer_part">
    <div class="container">
        <div class="row justify-content-around">
            <div class="col-sm-6 col-lg-3">
                <div class="single_footer_part">
                    <h4>Điện thoại nổi bật</h4>
                    <ul class="list-unstyled">
                        <li><a href="#">iPhone 15 Series</a></li>
                        <li><a href="#">Samsung Galaxy S24</a></li>
                        <li><a href="#">Xiaomi Redmi Note</a></li>
                        <li><a href="#">Điện thoại giá rẻ</a></li>
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
                    <p>Nhận thông tin khuyến mãi và sản phẩm mới nhất về điện thoại.</p>
                    <div id="mc_embed_signup">
                        
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
                        <p>© <script>document.write(new Date().getFullYear());</script> Điện Thoại 24h | Thiết kế bởi <a href="#">Đội ngũ Dev Mobile</a></p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="footer_icon social_icon">
                        <ul class="list-unstyled">
                            <li><a href="{{$contact->info_facebook}}" class="single_social_icon"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="{{$contact->info_instagram}}" class="single_social_icon"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="{{$contact->info_youtube}}" class="single_social_icon"><i class="fab fa-youtube"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--::footer_part end::-->
