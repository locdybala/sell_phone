@extends('layout')
@section('content')
    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Danh sách bài viết</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
            <li class="breadcrumb-item active text-white">Bài viết</li>
        </ol>
    </div>
    <!-- Fruits Shop Start-->
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
                            @if($posts->isEmpty())
                                <div class="col-12 text-center">
                                    <p>Chưa có bài viết nào</p>
                                </div>
                            @else
                            <div class="row g-4 justify-content-center">
                                @foreach($posts as $post)
                                    <div class="col-md-6 col-lg-6 col-xl-6">
                                        <div class="rounded position-relative fruite-item">
                                            <div class="fruite-img">
                                                <img src="/upload/post/{{$post->post_image}}"
                                                     class="img-fluid w-100 rounded-top" alt="">
                                            </div>
                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                <a href="{{route('postDetail',['slug'=>$post->post_slug])}}">
                                                    <h4>{{$post->post_title}}</h4></a>
                                                <p>{!! $post->post_description !!}</p>
                                                <div class="d-flex justify-content-between flex-lg-wrap">
                                                    <p class="text-dark fs-5 fw-bold mb-0">Lượt
                                                        xem: {{$post->post_view}}</p>
                                                    <a href="{{route('postDetail',['slug'=>$post->post_slug])}}"
                                                       class="btn btn-primary rounded-pill px-3 "><i
                                                            class="fa fa-street-view me-2 "></i> Xem chi tiết</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="col-12">
                                    <div class="pagination d-flex justify-content-center mt-5">
                                        <a href="{{$posts->previousPageUrl()}}"
                                           class="rounded {{$posts->onFirstPage() ? 'disabled' : ''}}">&laquo;</a>

                                        @for ($i = 1; $i <= $posts->lastPage(); $i++)
                                            <a href="{{$posts->url($i)}}"
                                               class="rounded {{$posts->currentPage() === $i ? 'active' : ''}}">{{$i}}</a>
                                        @endfor

                                        <a href="{{$posts->nextPageUrl()}}"
                                           class="rounded {{$posts->hasMorePages() ? '' : 'disabled'}}">&raquo;</a>
                                    </div>
                                </div>
                            </div>
                            @endif
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
