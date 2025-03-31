@extends('layout')
@section('content')
    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Chính sách cửa hàng</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
            <li class="breadcrumb-item active text-white">{{$page->title}}</li>
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
                                            @foreach($pagess as $value)
                                                <li>
                                                    <div class="d-flex justify-content-between fruite-name">
                                                        <a href="{{route('pages', ['slug' => $value->slug])}}"><i
                                                                class="fas fa-chevron-right me-2"></i>{{$value->name}}
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
                                <div class="blog_details">
                                    <h2>{{$page->title}}</h2>
                                    <p class="excert">
                                        {!! $page->content !!}
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

