<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BrandController extends Controller
{
    public function index()
    {
        $title = 'Danh sách thương hiệu';
        $brands = Brand::paginate(5);
        return view('backend.brand.index', compact('brands','title'));
    }

    public function create()
    {
        $title = 'Thêm thương hiệu';
        return view('backend.brand.add',compact('title'));
    }

    public function store(Request $request)
    {
        Brand::create([
            'brand_name' => $request->name,
            'brand_desc' => $request->description,
            'brand_status' => $request->status,
        ]);
        Session::put('success', 'Thêm thương hiệu sản phẩm thành công');
        return redirect()->route('all_brand');
    }

    public function unactive_brand($id)
    {
        Brand::find($id)->update([
            'brand_status' => 0
        ]);
        Session::put('success', 'Không kích hoạt thương hiệu sản phẩm thành công');
        return redirect()->route('all_brand');
    }

    public function active_brand($id)
    {
        Brand::find($id)->update([
            'brand_status' => 1
        ]);
        Session::put('success', 'Kích hoạt thương hiệu sản phẩm thành công');
        return redirect()->route('all_brand');

    }

    public function edit($id)
    {
        $title = 'Sửa thương hiệu';
        $brand = Brand::find($id);
        return view('backend.brand.update', compact('brand','title'));
    }

    public function update(Request $request, $id)
    {
        Brand::find($id)->update([
            'brand_name' => $request->name,
            'brand_desc' => $request->description,
            'brand_status' => $request->status
        ]);
        Session::put('success', 'Sửa thương hiệu sản phẩm thành công');
        return redirect()->route('all_brand');

    }

    public function delete($id)
    {
        Brand::find($id)->delete();
        Session::put('success', 'Xóa thương hiệu thành công');
        return redirect()->route('all_brand');

    }
}
