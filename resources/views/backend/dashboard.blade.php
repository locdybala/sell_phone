@extends('backend.admin_layout')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 col-md-4 order-1">
                <div class="row">
                    <div class="col-lg-3 col-md-12 col-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <img
                                            src="{{asset('backend/img/icons/unicons/chart-success.png')}}"
                                            alt="chart success"
                                            class="rounded"
                                        />
                                    </div>
                                    <div class="dropdown">
                                        <button
                                            class="btn p-0"
                                            type="button"
                                            id="cardOpt3"
                                            data-bs-toggle="dropdown"
                                            aria-haspopup="true"
                                            aria-expanded="false"
                                        >
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                            <a class="dropdown-item" target="_blank" href="{{route('all_product')}}">Xem chi tiết</a>
                                        </div>
                                    </div>
                                </div>
                                <span class="fw-semibold d-block mb-1">Tổng số sản phẩm</span>
                                <h3 class="card-title mb-2">{{$product_count}}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12 col-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <img
                                            src="{{asset('backend/img/icons/unicons/wallet-info.png')}}"
                                            alt="Credit Card"
                                            class="rounded"
                                        />
                                    </div>
                                    <div class="dropdown">
                                        <button
                                            class="btn p-0"
                                            type="button"
                                            id="cardOpt6"
                                            data-bs-toggle="dropdown"
                                            aria-haspopup="true"
                                            aria-expanded="false"
                                        >
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                                            <a class="dropdown-item" target="_blank" href="{{route('all_order')}}">Xem chi tiết</a>
                                        </div>
                                    </div>
                                </div>
                                <span class="fw-semibold d-block mb-1">Tổng số đơn hàng</span>
                                <h3 class="card-title text-nowrap mb-1">{{$order_count}}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12 col-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <img src="{{asset('backend/img/icons/unicons/paypal.png')}}" alt="Credit Card" class="rounded" />
                                    </div>
                                    <div class="dropdown">
                                        <button
                                            class="btn p-0"
                                            type="button"
                                            id="cardOpt4"
                                            data-bs-toggle="dropdown"
                                            aria-haspopup="true"
                                            aria-expanded="false"
                                        >
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt4">
                                            <a class="dropdown-item" target="_blank" href="{{route('all_customer')}}">Xem chi tiết</a>
                                        </div>
                                    </div>
                                </div>
                                <span class="d-block mb-1">Tổng số khách hàng</span>
                                <h3 class="card-title text-nowrap mb-2">{{$customer_count}}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12 col-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <img src="{{asset('backend/img/icons/unicons/cc-primary.png')}}" alt="Credit Card" class="rounded" />
                                    </div>
                                    <div class="dropdown">
                                        <button
                                            class="btn p-0"
                                            type="button"
                                            id="cardOpt1"
                                            data-bs-toggle="dropdown"
                                            aria-haspopup="true"
                                            aria-expanded="false"
                                        >
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="cardOpt1">
                                            <a class="dropdown-item" target="_blank" href="{{route('all_user')}}">Xem chi tiết</a>
                                        </div>
                                    </div>
                                </div>
                                <span class="fw-semibold d-block mb-1">Tài khoản quản lý</span>
                                <h3 class="card-title mb-2">{{$user_count}}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Total Revenue -->
            <div class="col-lg-12 col-md-4 order-1 mb-4">
                <div class="card">
                    <div class="row row-bordered g-0">
                        <div class="col-md-8">
                            <h5 class="card-header m-0 me-2 pb-3">Total Revenue</h5>
                            <div id="totalRevenueChart" class="px-2"></div>
                        </div>
                        <div class="col-md-4">
                            <div class="card-body">
                                <div class="text-center">
                                    <div class="dropdown">
                                        <button
                                            class="btn btn-sm btn-outline-primary dropdown-toggle"
                                            type="button"
                                            id="growthReportId"
                                            data-bs-toggle="dropdown"
                                            aria-haspopup="true"
                                            aria-expanded="false"
                                        >
                                            2022
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="growthReportId">
                                            <a class="dropdown-item" href="javascript:void(0);">2021</a>
                                            <a class="dropdown-item" href="javascript:void(0);">2020</a>
                                            <a class="dropdown-item" href="javascript:void(0);">2019</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="growthChart"></div>
                            <div class="text-center fw-semibold pt-3 mb-2">62% Company Growth</div>

                            <div class="d-flex px-xxl-4 px-lg-2 p-4 gap-xxl-3 gap-lg-1 gap-3 justify-content-between">
                                <div class="d-flex">
                                    <div class="me-2">
                                        <span class="badge bg-label-primary p-2"><i class="bx bx-dollar text-primary"></i></span>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <small>2022</small>
                                        <h6 class="mb-0">$32.5k</h6>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="me-2">
                                        <span class="badge bg-label-info p-2"><i class="bx bx-wallet text-info"></i></span>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <small>2021</small>
                                        <h6 class="mb-0">$41.2k</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Total Revenue -->

        </div>
        <div class="row">
            <!-- Order Statistics -->
            <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">
                <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-between pb-0">
                        <div class="card-title mb-0">
                            <h5 class="m-0 me-2">Thống kê tổng bài viết, sản phẩm, đơn hàng</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <input type="hidden" id="product_count" value="{{$product_count}}">
                        <input type="hidden" id="post_count" value="{{$post_count}}">
                        <input type="hidden" id="order_count" value="{{$order_count}}">
                        <input type="hidden" id="customer_count" value="{{$customer_count}}">
                            <div style="" id="orderStatisticsChart"></div>
                    </div>
                </div>
            </div>
            <!--/ Order Statistics -->

            <!-- Expense Overview -->
            <div class="col-md-6 col-lg-4 order-2 mb-4">
                <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="card-title m-0 me-2">Bài viết xem nhiều nhất</h5>

                    </div>
                    <div class="card-body">
                        <ul class="p-0 m-0">
                            @php $i=0; @endphp
                            @foreach($post as $post)
                                @php $i++; @endphp
                                <li class="d-flex mb-4 pb-1">
                                    <div class=" flex-shrink-0 me-3">
                                        {{$i}}
                                    </div>
                                    <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                        <div class="me-2">
                                            <h6 style="width: 310px;" class="mb-0"><a target="_blank" href="{{route('postDetail',['slug'=>$post->post_slug])}}">{{$post->post_title}}</a></h6>
                                        </div>
                                        <div class="user-progress d-flex align-items-center gap-1">
                                            <h6 class="mb-0">{{$post->post_view}}</h6>
                                        </div>
                                    </div>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>
            <!--/ Expense Overview -->
            <div class="col-md-6 col-lg-4 order-2 mb-4">
                <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="card-title m-0 me-2">Sản phẩm xem nhiều nhất</h5>

                    </div>
                    <div class="card-body">
                        <ul class="p-0 m-0">
                            @php $i=0; @endphp
                            @foreach($product as $product)
                                @php $i++; @endphp
                                <li class="d-flex mb-4 pb-1">
                                    <div class=" flex-shrink-0 me-3">
                                        {{$i}}
                                    </div>
                                    <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                        <div class="me-2">
                                            <h6 style="width: 310px;" class="mb-0"><a target="_blank" href="{{route('detailProduct',['id'=>$product->product_id])}}">{{$product->product_name}}</a></h6>
                                        </div>
                                        <div class="user-progress d-flex align-items-center gap-1">
                                            <h6 class="mb-0">{{$product->product_view}}</h6>
                                        </div>
                                    </div>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>

        </div>
        <h5 style="text-align: center" class="page-title">Thống kê doanh thu</h5>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form autocomplete="off">
                            @csrf
                            <div class="row">
                                <div class="col-lg-2">
                                    <p>Từ ngày: <input type="text" id="datepicker" class="form-control"></p>

                                </div>
                                <div class="col-lg-2">
                                    <p>Đến ngày: <input type="text" id="datepicker2" class="form-control"></p>

                                </div>
                                <div class="col-lg-2">
                                    <p>
                                        Lọc theo:
                                        <select name="" class="dashboard-filter form-control" id="">
                                            <option value="">--Chọn--</option>
                                            <option value="7ngay">7 ngày qua</option>
                                            <option value="thangtruoc">tháng trước</option>
                                            <option value="thangnay">tháng này</option>
                                            <option value="365ngayqua">365 ngày qua</option>

                                        </select>
                                    </p>
                                </div>
                            </div>
                            <input type="button" id="btn-dashboard-filter" class="btn btn--default btn-sm"
                                   value="Lọc kết quả">
                        </form>
                    </div>

                    <div class="card-body">
                        <div id="myfirstchart" style="height: 250px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  @endsection
@section('js')
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script type="text/javascript">

        $(function() {
            $("#datepicker").datepicker({
                prevText:"Tháng trước",
                nextText:"Tháng sau",
                dateFormat:"yy-mm-dd",
                dayNamesMin:['Thứ 2','Thứ 3','Thứ 4','Thứ 5', 'Thứ 6', 'Thứ 7','Chủ nhật'],
                duration:"slow"
            });
            $("#datepicker2").datepicker({
                prevText:"Tháng trước",
                nextText:"Tháng sau",
                dateFormat:"yy-mm-dd",
                dayNamesMin:['Thứ 2','Thứ 3','Thứ 4','Thứ 5', 'Thứ 6', 'Thứ 7','Chủ nhật'],
                duration:"slow"
            });

        });
        $(document).ready(function() {
            chart30daysorder();
            var chart = new Morris.Bar({
                element: 'myfirstchart',
                lineColors: ['#819C79', '#fc8710', '#FF6541', '#A4ADD3', '#766B56'],
                parseTime: false,
                xkey: 'period',
                ykeys: ['order', 'sales', 'profit', 'quantity'],
                behaveLikeLine: true,
                labels: ['đơn hàng', 'doanh số', 'lợi nhuận', 'số lượng']
            });
            $('#btn-dashboard-filter').click(function() {
                var _token = $('input[name="_token"]').val();
                var form_date = $('#datepicker').val();
                var to_date = $('#datepicker2').val();
                $.ajax({
                    url: "{{ url('/admin/filter-by-date') }}",
                    method: "POST",
                    data: {
                        form_date: form_date,
                        to_date: to_date,
                        _token: _token
                    },
                    dataType: "JSON",
                    success: function(data) {
                        chart.setData(data)
                    }
                });

            });

            function chart30daysorder() {
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{ url('/admin/days-order') }}",
                    method: "POST",
                    data: {
                        _token: _token
                    },
                    dataType: "JSON",
                    success: function(data) {
                        chart.setData(data)
                    }
                });
            }
            $('.dashboard-filter').change(function() {
                var dashboard_value = $(this).val();
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{ url('/admin/dashboard-filter') }}",
                    method: "POST",
                    data: {
                        dashboard_value: dashboard_value,
                        _token: _token
                    },
                    dataType: "JSON",
                    success: function(data) {
                        chart.setData(data)
                    }
                });
            });
        });
    </script>
@endsection
