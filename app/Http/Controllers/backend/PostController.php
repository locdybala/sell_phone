<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\CategoryPost;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    public function index()
    {
        $title = 'Danh sách bài viết';
        $posts = Post::paginate(5);
        return view('backend.post.index', compact('posts','title'));

    }

    public function create()
    {
        $title = 'Thêm bài viết';
        $category = CategoryPost::all();
        return view('backend.post.add', compact('category','title'));
    }

    public function store(Request $request)
    {

        $data = array();
        $data['post_title'] = $request->title;
        $data['cate_post_id'] = $request->category_id;
        $data['post_description'] = $request->description;
        $data['post_content'] = $request->contents;
        $data['meta_desc'] = $request->meta_desc;
        $data['meta_keywords'] = $request->meta_keywords;
        $data['post_slug'] = $request->slug;
        $data['post_status'] = $request->status;
        $file = $request->file('image');
        if ($file) {
            $getnameimage = $file->getClientOriginalName();
            $nameimage = current(explode('.', $getnameimage));
            $new_image = $nameimage . rand(0, 99) . '.' . $file->getClientOriginalExtension();
            $file->move('upload/post', $new_image);
            $data['post_image'] = $new_image;
            Post::create($data);
            Session::put('message', 'Thêm bài viết thành công');
            return redirect()->route('all_post');

        } else {
            Session::put('message', 'Làm ơn thêm hình ảnh');
            return redirect()->route('add_post');
        }


    }

    public function unactive_post($id)
    {
        Post::find($id)->update([
            'post_status' => 0
        ]);
        Session::put('success', 'Không kích hoạt bài viết thành công');
        return redirect()->route('all_post');
    }

    public function active_post($id)
    {
        Post::find($id)->update([
            'post_status' => 1
        ]);
        Session::put('success', 'Kích hoạt bài viết thành công');
        return redirect()->route('all_post');

    }

    public function edit($id)
    {
        $title = 'Sửa bài viết';
        $post = Post::find($id);
        $category = CategoryPost::all();
        return view('backend.post.update', compact('post', 'category','title'));
    }

    public function update(Request $request, $id)
    {
        $data = array();
        $data['post_title'] = $request->title;
        $data['cate_post_id'] = $request->category_id;
        $data['post_description'] = $request->description;
        $data['post_content'] = $request->contents;
        $data['meta_desc'] = $request->meta_desc;
        $data['meta_keywords'] = $request->meta_keywords;
        $data['post_slug'] = $request->slug;
        $data['post_status'] = $request->status;
        $file = $request->file('image');
        if ($file) {
            $getnameimage = $file->getClientOriginalName();
            $nameimage = current(explode('.', $getnameimage));
            $new_image = $nameimage . rand(0, 99) . '.' . $file->getClientOriginalExtension();
            $file->move('upload/post', $new_image);
            $data['post_image'] = $new_image;
            Post::find($id)->update($data);
            Session::put('success', 'Cập nhập bài viết thành công');
            return redirect()->route('all_post');

        }

        Post::find($id)->update($data);
        Session::put('success', 'Cập nhập bài viết thành công');
        return redirect()->route('all_post');

    }

    public function delete($id)
    {
        $post = Post::find($id);
        $postimage = $post->image;

        if ($postimage) {
            $path = 'public/upload/post' . $postimage;
            unlink($path);

        }
        $post->delete();


        Session::put('success', 'Xóa bài viết thành công');
        return redirect()->route('all_post');

    }
}
