<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\CategoryPost;
use App\Models\Comment;
use App\Models\Gallery;
use App\Models\Pages;
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
        $productSolds = Product::where('product_status', '1')->orderby('product_sold', 'desc')->limit(6)->get();
        $slider = Slider::where('slider_status', '1')->take(1)->first();
        $categorypost = CategoryPost::where('cate_post_status', '1')->orderby('cate_post_id', 'desc')->get();
        $pages = Pages::all();
        return view('pages.home', compact('category', 'brand', 'products', 'slider', 'categorypost', 'title', 'productNews', 'pages', 'productSolds'));
    }

    public function shop()
    {
        $title = 'Danh sách sản phẩm';
        $category = Category::where('category_status', '1')->orderby('category_id', 'desc')->get();
        $brand = Brand::where('brand_status', '1')->orderby('brand_id', 'desc')->get();
        $products = Product::where('product_status', '1')->get();
        $slider = Slider::where('slider_status', '1')->take(4)->get();
        $categorypost = CategoryPost::where('cate_post_status', '1')->orderby('cate_post_id', 'desc')->get();
        $pages = Pages::all();
        return view('pages.product.index', compact('category', 'brand', 'products', 'slider', 'categorypost', 'title', 'pages'));
    }

    public function list_wistList($customerId)
    {
        $title = 'Sản phẩm yêu thích';
        $category = Category::where('category_status', '1')->orderby('category_id', 'desc')->get();
        $brand = Brand::where('brand_status', '1')->orderby('brand_id', 'desc')->get();
        $slider = Slider::where('slider_status', '1')->take(4)->get();
        $categorypost = CategoryPost::where('cate_post_status', '1')->orderby('cate_post_id', 'desc')->get();
        $pages = Pages::all();
        return view('pages.product.wistlist', compact('category', 'brand', 'slider', 'categorypost', 'title', 'pages', 'customerId'));
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
        $pages = Pages::all();
        return view('pages.category.show_category', compact('category', 'brand', 'product', 'category_name', 'slider', 'categorypost', 'title', 'pages'));
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
        $pages = Pages::all();
        return view('pages.brand.show_brand', compact('category', 'brand', 'product', 'brand_name', 'slider', 'categorypost', 'title', 'pages'));
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
        $pages = Pages::all();
        return view('pages.product.detail_product', compact('category', 'gallery', 'title', 'brand', 'productDetail', 'related_products', 'slider', 'categorypost', 'pages'));
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
        $pages = Pages::all();
        return view('pages.product.search', compact('category', 'brand', 'product', 'categorypost', 'title', 'slider', 'pages'));

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

            $output .= ' <div  class="comment-list">
            <div class="single-comment justify-content-between d-flex">
                                <div class="user justify-content-between d-flex">
                                    <div class="thumb">
                                        <img src="' . url('frontend/assets/img/comment/comment_1.png') . '" alt="">
                                    </div>
                                    <div class="desc">
                                    <div class="d-flex justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <h5>
                                                    <a href="#">@' . $comment->comment_name . '</a>
                                                </h5>
                                                <p class="date"> ' . $comment->comment_date . '</p>
                                            </div>
                                        </div>
                                        <p class="comment">
                                            ' . $comment->comment . '
                                        </p>

                                    </div>
                                </div>
                            </div> </div>
            ';
            foreach ($replycomments as $replycomment) {
                if ($replycomment->comment_parent === $comment->comment_id) {
                    $output .= '<div style="margin-left: 40px;"  class="comment-list"><div class="single-comment justify-content-between d-flex">
                                <div class="user justify-content-between d-flex">
                                    <div class="thumb">
                                        <img src="' . url('frontend/assets/img/comment/comment_1.png') . '" alt="">
                                    </div>
                                    <div class="desc">
                                    <div class="d-flex justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <h5>
                                                    <a href="#"><strong>' . $replycomment->comment_name . '</strong></a>
                                                </h5>
                                                <p class="date">' . $replycomment->comment_date . '</p>
                                            </div>

                                        </div>
                                        <p class="comment">
                                            ' . $replycomment->comment . '
                                        </p>

                                    </div>
                                </div>
                            </div></div>';
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
