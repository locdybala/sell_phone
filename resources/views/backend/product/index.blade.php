@extends('backend.admin_layout')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Trang chủ /</span> Danh sách sản phẩm</h4>
        @php
            $message=Session::get('message');

            if($message){
                echo '<div class="alert alert-danger">
                          '.$message.'
                        </div>';
                Session::put('message', null);

                                 }
        @endphp

        @php
            $success=Session::get('success');
            if($success){
            echo '<div class="alert alert-success">
                 '.$success.'
               </div>';
            Session::put('success', null);}
        @endphp
        <a href="{{ route('add_product') }}" class="btn btn-success mb-2">Thêm sản phẩm</a>
        <!-----export data---->
        <form action="{{route('export_csv')}}" method="POST">
            @csrf
            <input type="submit" value="Export file Excel" name="export_csv" class="btn btn-success mb-2">
        </form>
        <div class="card">
            <h5 class="card-header">Danh sách sản phẩm</h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên sản phẩm</th>
                        <th>Thư viện ảnh</th>
                        <th>Giá</th>
                        <th>Hình ảnh</th>
                        <th>Số lượng</th>
                        <th>Danh mục</th>
                        <th>Thương hiệu</th>
                        <th>Tình trạng</th>
                        <th>Thao tác</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @php
                        $i = 0;
                    @endphp
                    @if ($product)
                        @foreach ($product as $product)
                            @php
                                $i++;
                            @endphp
                            <tr>
                                <td>{{$i}}</td>

                                <td><strong>{{$product->product_name}}</strong></td>
                                <td><a class="btn btn-sm btn-primary" href="{{route('add_gallery',['product_id'=>$product->product_id])}}">Thêm thư viện ảnh</a></td>
                                <td>{{$product->product_price}}</td>
                                <td><img src="/upload/product/{{ $product->product_image }}" style="width:150px;height:100px;" alt=""></td>
                                <td>{{$product->product_quantity}}</td>
                                <td>{{ optional($product->category)->category_name }}</td>
                                <td>{{ optional($product->brand)->brand_name }}</td>

                                @if ($product->product_status==1)

                                    <td>
                                        <a href="{{ route('unactive_product',['id'=>$product->product_id]) }}"><span
                                                class="badge bg-label-primary me-1">Kích hoạt</span></a></td>
                                @else
                                    <td><a href="{{ route('active_product',['id'=>$product->product_id]) }}"><span
                                                class="badge bg-label-warning me-1">Không kích hoạt</span></a></td>

                                @endif
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">

                                            <a class="dropdown-item"
                                               href="{{ route('updateproduct',['id'=>$product->product_id]) }}"
                                            ><i class="bx bx-edit-alt me-1"></i> Sửa</a
                                            >
                                            <form method="POST" action="">
                                                @csrf
                                                @method('delete')
                                                <a onclick="return confirm('Bạn có muốn xóa sản phẩm này không?')" href="{{ route('deleteproduct',['id'=>$product->product_id]) }}" class="dropdown-item" ><i class="bx bx-trash me-1"> Xóa</i></a>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <td>Không có dữ liệu</td>
                    @endif
                    </tbody>
                </table>



            </div>
        </div>
        <!--/ Hoverable Table rows -->
    </div>
@endsection
