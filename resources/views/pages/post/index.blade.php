@extends('layout')
@section('content')
    <!--? Hero Area Start-->
    <div class="slider-area ">
        <div class="single-slider slider-height2 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>Danh sách bài viết</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--? Hero Area End-->
    <!--================Blog Area =================-->
    <section class="blog_area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">
                        @foreach($posts as $post)
                            <article class="blog_item">
                                <div class="blog_item_img">
                                    <img class="card-img rounded-0" src="/upload/post/{{$post->post_image}}" alt="">
                                    <a href="#" class="blog_item_date">
                                        @php
                                            $created_at = $post->created_at;

                                            // Tạo một đối tượng DateTime từ $created_at
                                            $date = new DateTime($created_at);

                                            // Lấy ngày và tháng
                                            $ngay = $date->format('d'); // Lấy ngày
                                            $thang = $date->format('m'); // Lấy tháng @endphp
                                        <h3>{{$ngay}}</h3>
                                        <p>Tháng {{$thang}}</p>
                                    </a>
                                </div>

                                <div class="blog_details">
                                    <a class="d-inline-block" href="{{route('postDetail',['slug'=>$post->post_slug])}}">
                                        <h2>{{$post->post_title}}</h2>
                                    </a>
                                    <p>{!! $post->post_description !!}</p>
                                    <ul class="blog-info-link">
                                        <li><a href="#"><i class="fa fa-user"></i> Travel, Lifestyle</a></li>
                                        <li><a href="#"><i class="fa fa-comments"></i> {{$post->post_view}}</a></li>
                                    </ul>
                                </div>
                            </article>
                        @endforeach
                        <nav class="blog-pagination justify-content-center d-flex">
                            <ul class="pagination">
                                <li class="page-item {{$posts->onFirstPage() ? 'disabled' : ''}}">
                                    <a href="{{$posts->previousPageUrl()}}" class="page-link" aria-label="Previous">
                                        <i class="ti-angle-left"></i>
                                    </a>
                                </li>
                                @for ($i = 1; $i <= $posts->lastPage(); $i++)

                                    <li class="page-item {{$posts->currentPage() === $i ? 'active' : ''}}">
                                        <a href="{{$posts->url($i)}}" class="page-link">{{$i}}</a>
                                    </li>
                                @endfor

                                <li class="page-item {{$posts->hasMorePages() ? '' : 'disabled'}}">
                                    <a class="page-link" href="{{$posts->nextPageUrl()}}" aria-label="Next">
                                        <i class="ti-angle-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget post_category_widget">
                            <h4 class="widget_title">Danh mục</h4>
                            <ul class="list cat-list">
                                @foreach($categorypost as $categorypost)
                                    <li>
                                        <a href="#" class="d-flex">
                                            <p>{{$categorypost->cate_post_name}}</p>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('javascript')
    <script>$(".label_title").each(function () {
            if ($(this).text().length > 200) {
                $(this).text($(this).text().substr(0, 200));
                $(this).append('...');
            }
        });</script>
@endsection
