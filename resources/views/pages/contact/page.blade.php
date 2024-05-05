@extends('layout')
@section('content')
    <section class="blog_area single-post-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget post_category_widget">
                            <h4 class="widget_title">Danh mục</h4>
                            <ul class="list cat-list">
                                @foreach($pagess as $value)
                                    <li>
                                        <a href="{{route('pages', ['slug' => $value->slug])}}" class="d-flex">
                                            <p>{{$value->name}}</p>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </aside>
                    </div>
                </div>
                <div class="col-lg-8 posts-list">
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
    </section>
@endsection

