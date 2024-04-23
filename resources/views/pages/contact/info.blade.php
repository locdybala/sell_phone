@extends('layout')
@section('content')
    <!--? Hero Area Start-->
    <div class="slider-area ">
        <div style="min-height: 300px" class="single-slider slider-height2 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>Liên hệ</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--? Hero Area End-->
    <!-- ================ contact section start ================= -->
    <section class="contact-section">
        <div class="container">
            <div class="d-none d-sm-block mb-5 pb-4">
                {!! $contact->info_map!!}
            </div>


            <div class="row">
                <div class="col-12">
                    <h2 class="contact-title">Phản hồi với cửa hàng</h2>
                </div>
                <div class="col-lg-8">
                    <form class="form-contact contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Viết phản hồi'" placeholder=" Viết phản hồi"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control valid" name="name" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nhập tên'" placeholder="Nhập tên">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control valid" name="email" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Địa chỉ email'" placeholder="Địa chỉ email">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input class="form-control" name="subject" id="subject" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nhập chủ đề'" placeholder="Nhập chủ đề">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="button button-contactForm boxed-btn">Gửi</button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-3 offset-lg-1">
                    {!! $contact->info_contact !!}
                </div>
            </div>
        </div>
    </section>
    <!-- ================ contact section end ================= -->
@endsection

