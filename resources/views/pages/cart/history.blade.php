@extends('layout')
@section('content')
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Lịch sử mua hàng</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="{{URL::to('/')}}">Trang Chủ</a></li>
            <li class="breadcrumb-item active text-white">Lịch sử mua hàng</li>
        </ol>
    </div>
    <!-- Checkout Page Start -->
    <div class="container-fluid fruite py-5">
        <div class="container py-5">
            <div class="row g-4">
                <div class="col-lg-12">
                    <div class="row g-4">
                        <div class="col-lg-3">
                            <div class="row g-4">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <h4>Quản lý tài khoản</h4>
                                        <ul class="list-unstyled fruite-categorie">
                                            <li>
                                                <div class="d-flex justify-content-between fruite-name">
                                                    <a href="{{URL::to('/edit-customer/' . Session::get('customer_id'))}}"><i
                                                            class="fas fa-apple-alt me-2"></i>Thông tin tài khoản
                                                    </a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex justify-content-between fruite-name">
                                                    <a href="{{route('history')}}"><i
                                                            class="fas fa-apple-alt me-2"></i>Lịch sử mua hàng
                                                    </a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex justify-content-between fruite-name">
                                                    <a href="{{route('logout')}}"><i
                                                            class="fas fa-apple-alt me-2"></i>Đăng xuất
                                                    </a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <h3>Lịch sử mua hàng</h3>
                            @if(session()->has('message'))
                                <div class="alert alert-success">
                                    {!! session()->get('message') !!}
                                </div>
                                {{ session()->forget('message') }} <!-- Xóa thông báo -->
                            @elseif(session()->has('error'))
                                <div class="alert alert-danger">
                                    {!! session()->get('error') !!}
                                </div>
                                {{ session()->forget('error') }} <!-- Xóa thông báo -->
                            @endif
                            <div class="cart_inner">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th scope="col">Thứ tự</th>
                                            <th scope="col">Mã đơn hàng</th>
                                            <th scope="col">Ngày tháng đặt hàng</th>
                                            <th scope="col">Tình trạng đơn hàng</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                            $i = 0;
                                        @endphp
                                        @if ($orders)
                                            @foreach ($orders as $order)
                                                @php
                                                    $i++;
                                                @endphp
                                                <tr>
                                                    <td><i>{{$i}}</i></td>
                                                    <td>{{ $order->order_code }}</td>
                                                    <td>{{ $order->order_date }}</td>


                                                    @if ($order->order_status==1)

                                                        <td>
                                        <span>Đơn hàng mới</span></td>
                                                    @elseif($order->order_status== 2)
                                                        <td>
                                        <span>Hoàn thành</span></td>
                                                    @elseif($order->order_status== 3)
                                                        <td>
                                        <span>Đơn hàng đã hủy</span></td>
                                                    @elseif($order->order_status== 4)
                                                        <td>
                                        <span>Đơn hàng đã được xác nhận</span></td>
                                                    @elseif($order->order_status== 5)
                                                        <td>
                                        <span>Đang trên đường vận chuyển</span></td>
                                                    @else
                                                        <td><span>Đơn hàng mới - Đã thanh toán</span></td>
                                                    @endif
                                                    <td>


                                                        <a href="{{route('view_order_history',['order_code'=> $order->order_code])}}"
                                                           class="genric-btn success">
                                                            Chi tiết</a>


                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <td>Không có dữ liệu</td>
                                        @endif
                                        </tbody>
                                    </table>
                                    <div class="col-12">
                                        <div class="pagination d-flex justify-content-center mt-5">
                                            <a href="{{$orders->previousPageUrl()}}"
                                               class="rounded {{$orders->onFirstPage() ? 'disabled' : ''}}">&laquo;</a>

                                            @for ($i = 1; $i <= $orders->lastPage(); $i++)
                                                <a href="{{$orders->url($i)}}"
                                                   class="rounded {{$orders->currentPage() === $i ? 'active' : ''}}">{{$i}}</a>
                                            @endfor

                                            <a href="{{$orders->nextPageUrl()}}"
                                               class="rounded {{$orders->hasMorePages() ? '' : 'disabled'}}">&raquo;</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
