<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\CategoryPost;
use App\Models\Comment;
use App\Models\Gallery;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        $title = 'Trang chủ';
        $category = Category::where('category_status', '1')->orderby('category_id', 'desc')->get();
        $brand = Brand::where('brand_status', '1')->orderby('brand_id', 'desc')->get();
        $products = Product::where('product_status', '1')->limit(6)->get();
        $productNews = Product::where('product_status', '1')->orderby('product_id', 'desc')->limit(3)->get();
        $slider = Slider::where('slider_status', '1')->take(4)->get();
        $categorypost = CategoryPost::where('cate_post_status', '1')->orderby('cate_post_id', 'desc')->get();
        return view('pages.home', compact('category', 'brand', 'products', 'slider', 'categorypost', 'title', 'productNews'));
    }

    public function shop()
    {
        $title = 'Danh sách sản phẩm';
        $category = Category::where('category_status', '1')->orderby('category_id', 'desc')->get();
        $brand = Brand::where('brand_status', '1')->orderby('brand_id', 'desc')->get();
        $products = Product::where('product_status', '1')->get();
        $slider = Slider::where('slider_status', '1')->take(4)->get();
        $categorypost = CategoryPost::where('cate_post_status', '1')->orderby('cate_post_id', 'desc')->get();
        return view('pages.product.index', compact('category', 'brand', 'products', 'slider', 'categorypost', 'title'));
    }

    public function detailCategory($id)
    {
        $title = 'Sản phẩm theo danh mục';
        $slider = Slider::where('slider_status', '1')->take(4)->get();
        $category = Category::where('category_status', '1')->orderby('category_id', 'desc')->get();
        $brand = Brand::where('brand_status', '1')->orderby('brand_id', 'desc')->get();
        $product = Product::where('product_status', '1')->where('category_id', $id)->orderby('product_id', 'desc')->limit(8)->get();
        $category_name = Category::find($id);
        $categorypost = CategoryPost::where('cate_post_status', '1')->orderby('cate_post_id', 'desc')->get();
        return view('pages.category.show_category', compact('category', 'brand', 'product', 'category_name', 'slider', 'categorypost', 'title'));
    }

    public function detailBrand($id)
    {
        $title = 'Sản phẩm theo thương hiệu';
        $brand_name = Brand::find($id)->brand_name;
        $slider = Slider::where('slider_status', '1')->take(4)->get();
        $category = Category::where('category_status', '1')->orderby('category_id', 'desc')->get();
        $brand = Brand::where('brand_status', '1')->orderby('brand_id', 'desc')->get();
        $product = Product::where('product_status', '1')->where('brand_id', $id)->orderby('product_id', 'desc')->limit(8)->get();
        $categorypost = CategoryPost::where('cate_post_status', '1')->orderby('cate_post_id', 'desc')->get();
        return view('pages.brand.show_brand', compact('category', 'brand', 'product', 'brand_name', 'slider', 'categorypost', 'title'));
    }

    public function detailProduct($id)
    {
        $title = 'Chi tiết sản phẩm';
        $slider = Slider::where('slider_status', '1')->take(4)->get();
        $category = Category::where('category_status', '1')->orderby('category_id', 'desc')->get();
        $brand = Brand::where('brand_status', '1')->orderby('brand_id', 'desc')->get();
        $productDetail = Product::find($id);
        $view = $productDetail->product_view;
        $productDetail->product_view = $view + 1;
        $productDetail->save();
        $category_id = $productDetail->category_id;
        $related_products = Product::where('category_id', $category_id)->whereNotIn('tbl_product.product_id', [$id])->get();
        $gallery = Gallery::where('product_id', $id)->get();
        $categorypost = CategoryPost::where('cate_post_status', '1')->orderby('cate_post_id', 'desc')->get();
        return view('pages.product.detail_product', compact('category', 'gallery', 'title', 'brand', 'productDetail', 'related_products', 'slider', 'categorypost'));
    }

    public function search(Request $request)
    {
        $title = 'Tìm kiếm';
        $category = Category::where('category_status', '1')->orderby('category_id', 'desc')->get();
        $brand = Brand::where('brand_status', '1')->orderby('brand_id', 'desc')->get();
        $keywords = $request->keywords_submit;
        $categorypost = CategoryPost::where('cate_post_status', '1')->orderby('cate_post_id', 'desc')->get();
        $product = Product::where('product_name', 'like', '%' . $keywords . '%')->get();
        $slider = Slider::where('slider_status', '1')->take(4)->get();

        return view('pages.product.search', compact('category', 'brand', 'product', 'categorypost', 'title', 'slider'));

    }

    public function tag($product_tag)
    {
        echo $product_tag;
    }

    public function load_comments(Request $request)
    {
        $product = $request->product_id;
        $comments = Comment::where('product_id', $product)->where('comment_status', 1)->get();
        $replycomments = Comment::all();
        $output = '';
        foreach ($comments as $comment) {
            $output .= '<div style="border: 1px solid #ddd; border-radius: 10px; background-color: #F0F0E9"
                                     class="row style_comment">

                                    <div class="col-md-2">
                                        <img width="80%" style="border-radius: 50%"
                                             src="' . url('frontend/images/man.png') . '"
                                             class="img img-responsive img-thumbnail" alt="">
                                    </div>
                                    <div style="margin-top: 10px;" class="mt-2 col-md-10">
                                        <span><strong style="color: #1ddf61;">@' . $comment->comment_name . '</strong></span>
                                        <p><i class="fa fa-clock-o"> </i> ' . $comment->comment_date . '</p>
                                        <p>' . $comment->comment . '</p>
                                    </div>

                                </div><p></p>
                                ';
            foreach ($replycomments as $replycomment) {
                if ($replycomment->comment_parent === $comment->comment_id) {
                    $output .= '
                                <div style="border: 1px solid #ddd; border-radius: 10px; background-color: #F0F0E9; margin-left: 10px;"
                                     class="row style_comment">

                                    <div class="col-md-2">
                                        <img width="80%" style="border-radius: 50%"
                                             src="' . url('frontend/images/woman.png') . '"
                                             class="img img-responsive img-thumbnail" alt="">
                                    </div>
                                    <div style="margin-top: 10px;" class="mt-2 col-md-10">
                                        <span><strong style="color: #af1ddf;">@' . $replycomment->comment_name . '</strong></span>
                                        <p><i class="fa fa-clock-o"> </i> ' . $replycomment->comment_date . '</p>
                                        <p>' . $replycomment->comment . '</p>
                                    </div>

                                </div><p></p>';
                }
            }
        }
        echo $output;
    }

    public function send_comments(Request $request)
    {
        $date = Carbon::now('Asia/Ho_Chi_Minh');
        $product_id = $request->product_id;
        $comment_name = $request->comment_name;
        $comment_content = $request->comment_content;

        $comment = new Comment();
        $comment->comment_name = $comment_name;
        $comment->comment = $comment_content;
        $comment->product_id = $product_id;
        $comment->comment_date = $date->toDateTimeString();
        $comment->comment_status = 0;
        $comment->save();
    }
}
