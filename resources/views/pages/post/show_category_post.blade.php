@extends('layout')
@section('content')
    <div class="col-sm-12 padding-right">
        <div class="features_items">
            <!--features_items-->
<style>

</style>
            <h2 class="title text-center">Danh mục bài viết {{$cate_post_name->cate_post_name}}</h2>
                <div class="row">


                    @foreach($post as $post)
            <div class="col-md-12">
                <div class="product-image-warapper">
                    <div class="single-products" style="margin: 10px 0;">
                        <div class=" text-center">
                            <img style="float: left;width: 40%;
    height: 200px;padding: 5px;" src="/upload/post/{{$post->post_image}}" alt="">
                            <h4  style="color: #000;padding: 5px;">{{$post->post_title}}</h4>
                            <span class="label_title">{!! $post->post_description !!}</span>
                        </div>
                        <div class="text-right">
                            <a href="{{route('postDetail',['slug'=>$post->post_slug])}}" class="btn btn-default btn-sm">Xem bài viết</a>
                        </div>
                    </div>
                    <div class="clear-fix"></div>
                </div>
            </div>

                    @endforeach



                </div>
        </div>
        <!--features_items-->
    </div>
@endsection
@section('javascript')
    <script>$(".label_title").each(function(){if ($(this).text().length > 200) {$(this).text($(this).text().substr(0, 200));$(this).append('...');}});</script>
    @endsection
