@extends('layout')
@section('content')
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Chi tiết bài viết</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="#">Bài viết</a></li>
            <li class="breadcrumb-item active text-white">{{$post->post_title}}</li>
        </ol>
    </div>
    <div class="container-fluid fruite py-5">
        <div class="container py-5">
            <div class="row g-4">
                <div class="col-lg-12">
                    <div class="row g-4">
                        <div class="col-lg-3">
                            <div class="row g-4">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <h4>Danh mục bài viết</h4>
                                        <ul class="list-unstyled fruite-categorie">
                                            @foreach($categorypost as $categorypost)
                                                <li>
                                                    <div class="d-flex justify-content-between fruite-name">
                                                        <a href="{{route('detaiCategoryPost', ['slug' => $categorypost->cate_post_slug])}}"><i
                                                                class="fas fa-apple-alt me-2"></i>{{$categorypost->cate_post_name}}
                                                        </a>
                                                    </div>
                                                </li>
                                            @endforeach

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="single-post">
                                <div class="feature-img">
                                    <img class="img-fluid" src="/upload/post/{{$post->post_image}}" alt="">
                                </div>
                                <div class="blog_details">
                                    <h2>{{$post->post_title}}
                                    </h2>
                                    <ul class="blog-info-link mt-3 mb-4">
                                        <li><a href="#"><i class="fa fa-user"></i> Travel, Lifestyle</a></li>
                                        <li><a href="#"><i class="fa fa-comments"></i> 03 Comments</a></li>
                                    </ul>
                                    <p class="excert">
                                        {!! $post->post_description !!}
                                    </p>
                                    <p>
                                        {!! $post->post_content !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <script>$(".label_title").each(function () {
            if ($(this).text().length > 200) {
                $(this).text($(this).text().substr(0, 200));
                $(this).append('...');
            }
        });</script>
@endsection
