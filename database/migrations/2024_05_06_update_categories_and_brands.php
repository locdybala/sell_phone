<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Cập nhật bảng category
        Schema::table('tbl_category', function (Blueprint $table) {
            $table->string('category_icon')->nullable()->after('category_desc');
        });

        // Cập nhật bảng brand
        Schema::table('tbl_brand', function (Blueprint $table) {
            $table->string('brand_logo')->nullable()->after('brand_desc');
        });
    }

    public function down()
    {
        Schema::table('tbl_category', function (Blueprint $table) {
            $table->dropColumn('category_icon');
        });

        Schema::table('tbl_brand', function (Blueprint $table) {
            $table->dropColumn('brand_logo');
        });
    }
}; 