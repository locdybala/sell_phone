@extends('layout')
@section('content')
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Liên hệ</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="{{URL::to('/')}}">Trang chủ</a></li>
            <li class="breadcrumb-item active text-white">Liên hệ</li>
        </ol>
    </div>
    <!-- Contact Start -->
    <div class="container-fluid contact py-5">
        <div class="container py-5">
            <div class="p-5 bg-light rounded">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="text-center mx-auto" style="max-width: 700px;">
                            <h1 class="text-primary">Hãy liên lạc</h1>
                            <p class="mb-4">Xem địa chỉ trực tiếp của shop
                                <a href="https://s.net.vn/MlVv">Xem ngay</a>.</p>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="h-100 rounded">
                            {!! $contact->info_map!!}
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <form action="" class="">
                            <input type="text" class="w-100 form-control border-0 py-3 mb-4" placeholder="Họ và tên">
                            <input type="email" class="w-100 form-control border-0 py-3 mb-4" placeholder="Địa chỉ email">
                            <textarea class="w-100 form-control border-0 mb-4" rows="5" cols="10" placeholder="Viết phản hồi"></textarea>
                            <button class="w-100 btn form-control border-secondary py-3 bg-white text-primary " type="submit">Gửi</button>
                        </form>
                    </div>
                    <div class="col-lg-5">
                        {!! $contact->info_contact !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

