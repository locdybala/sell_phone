@extends('home')
@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="{{URL::to('/')}}">Trang chủ</a></li>
                    <li class="active">Lịch sử mua hàng</li>
                </ol>
            </div>
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {!!   session()->get('message') !!}
                </div>
            @elseif(session()->has('error'))
                <div class="alert alert-danger">
                    {!!  session()->get('error') !!}
                </div>
            @endif
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                    <tr class="cart_menu">

                        <th>Thứ tự</th>
                        <th>Mã đơn hàng</th>
                        <th>Ngày tháng đặt hàng</th>
                        <th>Tình trạng đơn hàng</th>

                        <th style="width:30px;"></th>
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
                                            class="badge bg-label-primary me-1">Đơn hàng mới</span></td>
                                @elseif($order->order_status== 3)
                                    <td>
                                        <span
                                            class="badge bg-label-primary me-1">Đơn hàng đã hủy</span></td>
                                @else
                                    <td><span
                                            class="badge bg-label-warning me-1">Đã xử lý</span></td>

                                @endif
                                <td>


                                    <a href="{{route('view_order_history',['order_code'=> $order->order_code])}}"
                                       class="dropdown-item">
                                        Chi tiết</a>


                                </td>
                            </tr>
                        @endforeach
                    @else
                        <td>Không có dữ liệu</td>
                    @endif
                    </tbody>
                </table>
                <footer class="panel-footer">
                    <div class="row">
                        <div class="col-md-5 text-center"></div>
                        <div class="col-md-7 text-center text-center-xs">
                            <ul class="pagination pagination-sm m-t-none m-b-none">
                                {!! $orders->links() !!}
                            </ul>
                        </div>

                    </div>
                </footer>
            </div>

        </div>
    </section>
@endsection
