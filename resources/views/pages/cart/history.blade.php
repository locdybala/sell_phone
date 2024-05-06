@extends('layout')
@section('content')
    <div class="slider-area ">
        <div style="min-height:300px;" class="single-slider slider-height2 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>Lịch sử mua hàng</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--================Cart Area =================-->
    <section class="cart_area section_padding">
        <div class="container">
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {!!   session()->get('message') !!}
                </div>
            @elseif(session()->has('error'))
                <div class="alert alert-danger">
                    {!!  session()->get('error') !!}
                </div>
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
                                    <td>{{ $order->created_at }}</td>


                                    @if ($order->order_status==1)

                                        <td>
                                        <span
                                            class="badge badge-primary">Đơn hàng mới</span></td>
                                    @elseif($order->order_status== 2)
                                        <td>
                                        <span
                                            class="badge badge-secondary">Đơn hàng đã thanh toán</span></td>
                                    @elseif($order->order_status== 3)
                                        <td>
                                        <span
                                            class="badge badge-secondary">Đơn hàng đã hủy</span></td>
                                    @else
                                        <td><span
                                                class="badge badge-success">Đã xử lý</span></td>
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
                    <nav class="blog-pagination justify-content-center d-flex">
                        <ul class="pagination">
                            <!-- Nút Previous -->
                            @if ($orders->onFirstPage())
                                <li class="page-item disabled">
                                    <span class="page-link" aria-hidden="true">&laquo;</span>
                                </li>
                            @else
                                <li class="page-item">
                                    <a href="{{ $orders->previousPageUrl() }}" class="page-link" aria-label="Previous">&laquo;</a>
                                </li>
                            @endif
                            <style>
                                .page-item.active .page-link {
                                    z-index: 1;
                                    color: #fff !important;
                                    background-color: #007bff !important;
                                    border-color: #007bff !important;
                                }
                            </style>
                            @foreach ($orders->getUrlRange(1, $orders->lastPage()) as $page => $url)
                                <li class="page-item {{ $page == $orders->currentPage() ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                            @endforeach

                            <!-- Nút Next -->
                            @if ($orders->hasMorePages())
                                <li class="page-item">
                                    <a href="{{ $orders->nextPageUrl() }}" class="page-link"
                                       aria-label="Next">&raquo;</a>
                                </li>
                            @else
                                <li class="page-item disabled">
                                    <span class="page-link" aria-hidden="true">&raquo;</span>
                                </li>
                            @endif
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>
@endsection
