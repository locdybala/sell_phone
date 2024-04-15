@extends('layout')
@section('content')
    <div class="col-sm-12 padding-right">
        <div class="features_items">
            <!--features_items-->
            <h2 style="margin: 0px; position: inherit;" class="title text-center">{{$post->post_title}}</h2>
            <div class="row">
                <div class="col-md-12">
                    <div class="product-image-warapper">
                        <div class="single-products" style="margin: 10px 0;">
                            <span style="" class="">{!! $post->post_description !!}</span>
                            {!! $post->post_content !!}
                        </div>
                        <div class="clear-fix"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="features_items">
            <!--features_items-->
            <h2 style="margin: 0px; position: inherit;" class="title text-center">Bài viết liên quan</h2>
            <div class="row">
                <div class="col-md-12">
                    <ul  class="post_relate">
                        <style>
                            ul.post_relate li a:hover {
                                color: #1ddf61;
                            }
                        </style>
                        @foreach($related_post as $related_post)
                            <li style="list-style-type: disc; font-size: 16px; padding: 6px">
                                <a style="color: #000;" href="{{route('postDetail',['slug'=>$related_post->post_slug])}}">{{$related_post->post_title}}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <!--features_items-->
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
