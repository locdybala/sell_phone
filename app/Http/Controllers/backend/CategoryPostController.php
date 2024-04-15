<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\CategoryPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryPostController extends Controller
{
    public function index()
    {
        $title = 'Danh sách danh mục bài viết';
        $category = CategoryPost::all();
        return view('backend.category_post.index', compact('category', 'title'));
    }

    public function create()
    {
        $title = 'Thêm danh mục bài viết';
        return view('backend.category_post.add',compact('title'));
    }

    public function store(Request $request)
    {
        CategoryPost::create([
            'cate_post_name' => $request->name,
            'cate_post_slug' => $request->slug,
            'cate_post_description' => $request->description,
            'cate_post_status' => $request->status,
        ]);
        Session::put('success', 'Thêm danh mục bài viết thành công');
        return redirect()->route('all_category_post');
    }

    public function edit($id)
    {
        $title = 'Sửa danh mục bài viết';
        $category = CategoryPost::find($id);
        return view('backend.category_post.update', compact('category','title'));
    }

    public function update(Request $request, $id)
    {
        CategoryPost::find($id)->update([
            'cate_post_name' => $request->name,
            'cate_post_slug' => $request->slug,
            'cate_post_description' => $request->description,
            'cate_post_status' => $request->status,

        ]);
        Session::put('success', 'Sửa danh mục bài viết thành công');
        return redirect()->route('all_category_post');
    }

    public function delete($id)
    {
        CategoryPost::find($id)->delete();
        Session::put('success', 'Xóa danh mục bài viết thành công');
        return redirect()->route('all_category_post');

    }
}
