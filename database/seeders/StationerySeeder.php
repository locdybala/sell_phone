<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StationerySeeder extends Seeder
{
    public function run()
    {
        // Thêm danh mục
        $categories = [
            [
                'category_name' => 'Văn phòng phẩm',
                'category_desc' => 'Các loại văn phòng phẩm cơ bản như bút, thước, gôm...',
                'category_status' => 1,
                'category_icon' => 'fa-pencil-alt'
            ],
            [
                'category_name' => 'Sách vở',
                'category_desc' => 'Các loại sách vở, tập, notebook...',
                'category_status' => 1,
                'category_icon' => 'fa-book'
            ],
            [
                'category_name' => 'Dụng cụ học tập',
                'category_desc' => 'Các dụng cụ học tập như compa, thước kẻ, máy tính...',
                'category_status' => 1,
                'category_icon' => 'fa-ruler'
            ],
            [
                'category_name' => 'Balo & Cặp sách',
                'category_desc' => 'Các loại balo, cặp sách học sinh, sinh viên...',
                'category_status' => 1,
                'category_icon' => 'fa-briefcase'
            ]
        ];

        foreach ($categories as $category) {
            DB::table('tbl_category')->insert($category);
        }

        // Thêm thương hiệu
        $brands = [
            [
                'brand_name' => 'Thiên Long',
                'brand_desc' => 'Thương hiệu văn phòng phẩm hàng đầu Việt Nam',
                'brand_status' => 1,
                'brand_logo' => 'thienlong.png'
            ],
            [
                'brand_name' => 'Bến Nghé',
                'brand_desc' => 'Thương hiệu sách vở chất lượng cao',
                'brand_status' => 1,
                'brand_logo' => 'bennghe.png'
            ],
            [
                'brand_name' => 'Hồng Hà',
                'brand_desc' => 'Thương hiệu văn phòng phẩm uy tín',
                'brand_status' => 1,
                'brand_logo' => 'hongha.png'
            ],
            [
                'brand_name' => 'Muji',
                'brand_desc' => 'Thương hiệu đồ dùng học tập Nhật Bản',
                'brand_status' => 1,
                'brand_logo' => 'muji.png'
            ]
        ];

        foreach ($brands as $brand) {
            DB::table('tbl_brand')->insert($brand);
        }
    }
} 