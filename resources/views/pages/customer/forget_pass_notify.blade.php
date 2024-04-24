<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Lấy lại mật khẩu</title>
</head>
<style>
        /* CSS thuần dựa trên các class của Bootstrap */
    .container {
        /* Thêm các thuộc tính container tương đương */
        margin-right: auto;
        margin-left: auto;
        max-width: 1320px;
        padding-right: 15px;
        padding-left: 15px;
    }

    .row {
        /* Thêm các thuộc tính row tương đương */
        display: flex;
        flex-wrap: wrap;
        margin-right: -15px;
        margin-left: -15px;
    }

    .col-md-3 {
        /* Thêm các thuộc tính col-md-3 tương đương */
        flex: 0 0 auto;
        width: 25%;
        max-width: 25%;
    }

    .col-md-6 {
        /* Thêm các thuộc tính col-md-6 tương đương */
        flex: 0 0 auto;
        width: 50%;
        max-width: 50%;
    }

    .border {
        /* Thêm các thuộc tính border tương đương */
        border: 1px solid #dee2e6 !important;
    }

    .rounded {
        /* Thêm các thuộc tính rounded tương đương */
        border-radius: 0.25rem !important;
    }

    .btn {
        /* Thêm các thuộc tính btn tương đương */
        display: inline-block;
        font-weight: 400;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        border: 1px solid transparent;
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        line-height: 1.5;
        border-radius: 0.25rem;
        transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out,
        box-shadow 0.15s ease-in-out;
        color: #fff;
        background-color: #198754;
        border-color: #198754;
    }

</style>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 ">
            <div style="text-align: center;">
                <img src="{{asset('frontend/assets/img/logo/logo.png')}}" style=" width: 100px; height: 50px;" alt="">
            </div>
            <h3>Đặt lại mật khẩu cửa web bán đồng hồ của bạn</h3>
            <div style="padding: 30px; " class="border rounded">
                <h4 class="text-center">Đặt lại mật khẩu tài khoản của bạn</h4>
                <p>Chúng tôi được biết bạn đã mất mật khẩu của cửa hàng chúng tôi. Xin lỗi vì điều đó!

                    Nhưng đừng lo lắng! Bạn có thể sử dụng nút sau để đặt lại mật khẩu của mình:</p>
                <div class=" text-center">
                    <a href="{{$data['body']}}" class="btn btn-success">Đặt lại mật khẩu</a>
                </div>
                <p>Nếu bạn không sử dụng liên kết này trong vòng 3 giờ, nó sẽ hết hạn. Để nhận liên kết đặt lại mật khẩu mới, hãy truy cập:
                    <a href="http://127.0.0.1:8000/forgot_pass">http://127.0.0.1:8000/forgot_pass</a>
                </p>
                <p>Cảm ơn,</p>
                <p>Cửa hàng bán đồng hồ</p>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>
