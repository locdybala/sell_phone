<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\CategoryPost;
use App\Models\City;
use App\Models\Coupon;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Product;
use App\Models\Shipping;
use App\Models\Slider;
use App\Models\SocialCustomers;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\Feeship;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class CheckoutController extends Controller
{
    public function login_checkout()
    {
        $title = 'Đăng nhập';
        $category = Category::where('category_status', '1')->orderby('category_id', 'desc')->get();
        $brand = Brand::where('brand_status', '1')->orderby('brand_id', 'desc')->get();
        $categorypost = CategoryPost::where('cate_post_status', '1')->orderby('cate_post_id', 'desc')->get();
        $slider = Slider::where('slider_status', '1')->take(4)->get();

        Session::forget('customer_id');

        return view('pages.checkout.login_checkout', compact('category', 'brand', 'categorypost', 'slider', 'title'));
    }

    public function logout_checkout()
    {
        $category = Category::where('category_status', '1')->orderby('category_id', 'desc')->get();
        $brand = Brand::where('brand_status', '1')->orderby('brand_id', 'desc')->get();
        $categorypost = CategoryPost::where('cate_post_status', '1')->orderby('cate_post_id', 'desc')->get();
        $slider = Slider::where('slider_status', '1')->take(4)->get();

        Session::forget('customer_id');
        Session::forget('customer_picture');
        Session::forget('customer_name');
        Session::forget('coupon');

        return view('pages.checkout.login_checkout', compact('category', 'brand', 'categorypost', 'slider'));
    }

    public function register()
    {
        $title = 'Đăng ký';
        $category = Category::where('category_status', '1')->orderby('category_id', 'desc')->get();
        $brand = Brand::where('brand_status', '1')->orderby('brand_id', 'desc')->get();
        $categorypost = CategoryPost::where('cate_post_status', '1')->orderby('cate_post_id', 'desc')->get();
        $slider = Slider::where('slider_status', '1')->take(4)->get();

        Session::forget('customer_id');
        return view('pages.customer.register', compact('category', 'brand', 'categorypost', 'slider', 'title'));
    }

    public function add_customer(Request $request)
    {

        $data = array();
        $data['customer_name'] = $request->customer_name;
        $data['customer_phone'] = $request->customer_phone;
        $data['customer_email'] = $request->customer_email;
        $data['customer_password'] = md5($request->customer_password);
        $data['customer_birthday'] = $request->customer_birthday;
        $data['customer_address'] = $request->customer_address;
        $customer_id = Customer::insertGetId($data);


        if ($customer_id) {
            Session::put('success', 'Đăng ký tài khoản thành công');
            return redirect()->route('loginCustomer');
        } else {
            Session::put('error', 'Đăng ký tài khoản thất bại');
            return redirect()->route('registerCustomer');
        }
    }

    public function login_customer(Request $request)
    {
        $email = $request->email_account;
        $password = md5($request->password_account);
        $result = Customer::where('customer_email', $email)->where('customer_password', $password)->first();
        $coupon = Session::get('coupon');
        if ($coupon == true) {
            Session::forget('coupon');
        }
        if ($result) {
            Session::put('customer_id', $result->customer_id);
            Session::put('customer_picture', $result->customer_picture);
            Session::put('customer_name', $result->customer_name);
            if (Session::get('cart')) {
                return Redirect::to('/checkout');

            } else {
                return Redirect::to('');
            }
        } else {
            Session::put('error', 'Tài khoản hoặc mật khẩu không chính xác');
            return redirect()->route('loginCustomer');
        }
    }

    public function checkout(Request $request)
    {
        $title =' Thanh toán';
        $category = Category::where('category_status', '1')->orderby('category_id', 'desc')->get();
        $brand = Brand::where('brand_status', '1')->orderby('brand_id', 'desc')->get();
        $city = City::orderby('matp', 'ASC')->get();
        $customer = Customer::where('customer_id', Session::get('customer_id'))->first();
        $categorypost = CategoryPost::where('cate_post_status', '1')->orderby('cate_post_id', 'desc')->get();
        $slider = Slider::where('slider_status', '1')->take(4)->get();
        $product = Product::where('product_status', '1')->orderby('product_id', 'desc')->limit(8)->get();

        if (Session::get('cart')) {
            return view('pages.checkout.show_checkout', compact('category', 'title' ,'brand', 'city', 'customer', 'categorypost', 'slider'));

        } else {
            return Redirect::to('/');
        }
    }

    public function calculate_fee(Request $request)
    {
        $data = $request->all();
        if ($data['matp']) {
            $feeship = Feeship::where('fee_matp', $data['matp'])->where('fee_maqh', $data['maqh'])->where('fee_xaid', $data['xaid'])->get();
            if ($feeship) {
                $count_feeship = $feeship->count();
                if ($count_feeship > 0) {
                    foreach ($feeship as $key => $fee) {
                        Session::put('fee', $fee->fee_feeship);
                        Session::save();
                    }
                } else {
                    Session::put('fee', 25000);
                    Session::save();
                }
            }

        }
    }

    public function del_fee()
    {
        Session::forget('fee');
        return redirect()->back();
    }

    public function confirm_order(Request $request)
    {
        $data = $request->all();
        if ($data['order_coupon'] != 'no') {
            $coupon = Coupon::where('coupon_code', $data['order_coupon'])->first();
            $coupon->coupon_time = $coupon->coupon_time - 1;
            $coupon->coupon_used = $coupon->coupon_used . ',' . Session::get('customer_id');
            $coupon_mail = $coupon->coupon_code;
            $coupon->save();
        } else {
            $coupon_mail = 'không có';
        }

        $shipping = new Shipping();
        $shipping->shipping_name = $data['shipping_name'];
        $shipping->shipping_email = $data['shipping_email'];
        $shipping->shipping_phone = $data['shipping_phone'];
        $shipping->shipping_address = $data['shipping_address'];
        $shipping->shipping_notes = $data['shipping_notes'];
        $shipping->shipping_method = $data['shipping_method'];
        $shipping->save();
        $shipping_id = $shipping->shipping_id;

        $checkout_code = substr(md5(microtime()), rand(0, 26), 5);


        $order = new Order();
        $order->customer_id = Session::get('customer_id');
        $order->shipping_id = $shipping_id;
        $order->order_status = 1;
        $order->order_code = $checkout_code;

        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $order->created_at = now();
        $order->order_date = \Carbon\Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');

        $order->save();

        if (Session::get('cart') == true) {
            foreach (Session::get('cart') as $key => $cart) {
                $order_details = new OrderDetails();
                $order_details->order_code = $checkout_code;
                $order_details->product_id = $cart['product_id'];
                $order_details->product_name = $cart['product_name'];
                $order_details->product_price = $cart['product_price'];
                $order_details->product_sales_quantity = $cart['product_qty'];
                $order_details->product_coupon = $data['order_coupon'];
                $order_details->product_feeship = $data['order_fee'];
                $order_details->save();
            }
        }
        $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s');
        $title_mail = "Đơn hàng xác nhận ngày" . ' ' . $now;
        $customer = Customer::find(Session::get('customer_id'));
        $data['email'] = $customer->customer_email;
        if (Session::get('cart') == true) {
            foreach (Session::get('cart') as $cart) {
                $cart_array[] = [
                    'product_name' => $cart['product_name'],
                    'product_price' => $cart['product_price'],
                    'product_qty' => $cart['product_qty']
                ];
            }
        }
        if (Session::get('fee') == true) {
            $fee = Session::get('fee');
        } else {
            $fee = '30000';
        }
        $shipping_array = [
            'fee' => $fee,
            'customer_name' => $customer->customer_name,
            'shipping_name' => $data['shipping_name'],
            'shipping_email' => $data['shipping_email'],
            'shipping_phone' => $data['shipping_phone'],
            'shipping_address' => $data['shipping_address'],
            'shipping_notes' => $data['shipping_notes'],
            'shipping_method' => $data['shipping_method']
        ];
        $ordercode_mail = [
            'coupon_code' => $coupon_mail,
            'order_code' => $checkout_code

        ];
        Mail::send('pages.mail.mail_order', ['cart_array' => $cart_array, 'shipping' => $shipping_array, 'order' => $ordercode_mail], function ($message) use ($title_mail, $data) {
            $message->to($data['email'])->subject($title_mail);
            $message->from($data['email'], $title_mail);
        });

        if ($data['shipping_method'] == "2") {
            $data1 = $this->paymentVnpay([
                'order_id' => $order->order_id,
                'amount' => $data['total_after'],
            ]);
            return response()->json($data1);
        } else {
            Session::forget('coupon');
            Session::forget('fee');
            Session::forget('cart');
        }

    }

    // create link thanh toán VNPay
    public function paymentVnpay($data_payment)
    {
        $vnp_TmnCode = env('VNP_TMNCODE'); //Mã website tại VNPAY
        $vnp_HashSecret = env('VNP_HASH_SECRET'); //Chuỗi bí mật
        $vnp_Url = env('VNP_URL');
        $vnp_Returnurl = env('VNP_RETURN_URL');

        $vnp_TxnRef = $data_payment['order_id']; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = 'Thanh toán bảo hiểm Medici Pro.';
        $vnp_OrderType = 'other';
        $vnp_Amount = $data_payment['amount'] * 100;
        $vnp_Locale = 'vn';
        $vnp_BankCode = '';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }

        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);//
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }

        $returnData = array('code' => '00'
        , 'message' => 'success'
        , 'data' => $vnp_Url);
        return $vnp_Url;
    }

    public function forgot_pass()
    {
        $title = 'Quên mật khẩu';
        $category = Category::where('category_status', '1')->orderby('category_id', 'desc')->get();
        $brand = Brand::where('brand_status', '1')->orderby('brand_id', 'desc')->get();
        $categorypost = CategoryPost::where('cate_post_status', '1')->orderby('cate_post_id', 'desc')->get();
        $slider = Slider::where('slider_status', '1')->take(4)->get();

        Session::forget('customer_id');
        Session::forget('coupon');

        return view('pages.customer.forgot_pass', compact('category', 'brand', 'categorypost', 'slider','title'));
    }

    public function send_mail_forgot_pass(Request $request)
    {
        $data = $request->all();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s');
        $title = "Lấy lại mật khẩu" . ' ' . $now;
        $customer = Customer::where('customer_email', $data['email_account'])->get();
        foreach ($customer as $cus) {
            $customer_id = $cus->customer_id;
        }
        if ($customer) {
            $count_customer = count($customer);
            if ($count_customer == 0) {
                return redirect()->back()->with('message', 'Email chưa được đăng ký để lấy lại mật khẩu');
            } else {
                $token_random = Str::random();
                $customer = Customer::find($customer_id);
                $customer->customer_token = $token_random;
                $toemail = $data['email_account'];
                $customer->save();
                $linkrequest = url('/update-new-password?email=' . $toemail . '&token=' . $token_random);
                $data = [
                    'name' => $title,
                    'body' => $linkrequest,
                    'email' => $toemail
                ];
                Mail::send('pages.customer.forget_pass_notify', ['data' => $data], function ($message) use ($title, $data) {
                    $message->to($data['email'])->subject($title);
                    $message->from($data['email'], $title);
                });
                return redirect()->back()->with('success', 'Gửi mail thành công, vui lòng truy cập vào email để đổi lại mật khẩu');
            }
        }
    }

    public function update_new_password(Request $request)
    {
        $category = Category::where('category_status', '1')->orderby('category_id', 'desc')->get();
        $brand = Brand::where('brand_status', '1')->orderby('brand_id', 'desc')->get();
        $categorypost = CategoryPost::where('cate_post_status', '1')->orderby('cate_post_id', 'desc')->get();
        $slider = Slider::where('slider_status', '1')->take(4)->get();
        return view('pages.customer.newpass', compact('category', 'brand', 'categorypost', 'slider'));
    }

    public function update_pass(Request $request)
    {
        $data = $request->all();
        $token_random = Str::random();
        $customer = Customer::where('customer_email', '=', $data['email_account'])->where('customer_token', '=', $data['token'])->get();
        $count = count($customer);
        if ($count > 0) {
            foreach ($customer as $cus) {
                $customer_id = $cus->customer_id;
            }
            $reset = Customer::find($customer_id);
            $reset->customer_password = md5($data['password_account']);
            $reset->customer_token = $token_random;
            $reset->save();
            return redirect('/login-checkout')->with('success', 'Mật khẩu đã được thay đổi thành công');
        } else {
            return redirect()->back()->with('error', 'Link đã quá hạn');
        }
    }

    public function login_customer_google()
    {
        config(['services.google.redirect' => env('GOOGLE_REDIRECT')]);
        return Socialite::driver('google')->redirect();
    }

    public function google_callback()
    {
        config(['services.google.redirect' => env('GOOGLE_REDIRECT')]);
        $users = Socialite::driver('google')->stateless()->user();
        $auth = $this->findofcreateCustomer($users, 'google');
        if ($authUser) {
            $account_name = Customer::where('customer_id', $auth->user)->first();
            Session::put('customer_id', $account_name->customer_id);
            Session::put('customer_picture', $account_name->customer_picture);
            Session::put('customer_name', $account_name->customer_name);
        } elseif ($customer_new) {
            $account_name = Customer::where('customer_id', $auth->user)->first();
            Session::put('customer_id', $account_name->customer_id);
            Session::put('customer_picture', $account_name->customer_picture);
            Session::put('customer_name', $account_name->customer_name);
        }
        return view('pages.login_checkout')->with('message', 'Đăng nhập bằng google thành công');
    }

    public function findofcreateCustomer($users, $provider)
    {
        $authUser = SocialCustomers::where('provider_customer_id', $users->id)->where('provider_customer_email', $users->email)->first();
        if ($authUser) {
            return $authUser;
        } else {
            $customer_new = new SocialCustomers([
                'provider_customer_id' => $users->id,
                'provider_customer_email' => $users->email,
                'provider' => strtoupper($provider)
            ]);

            $customer = Customer::where('customer_email', $users->email)->first();
            if (!$customer) {
                $customer = Customer::create([
                    'customer_name' => $users->name,
                    'customer_email' => $users->email,
                    'customer_picture' => $users->avatar,
                    'customer_password' => '',
                    'customer_phone' => ''
                ]);
            }
            $customer_new->customer()->associate($customer);
            $customer_new->save();
            return $customer_new;
        }
    }

    public function paymentSuccess(Request $request)
    {
        try {
            $data = $request->all();
            $order = Order::find($data['loc']);
            $order->update([
                'order_status' => 3,
            ]);
            Session::forget('coupon');
            Session::forget('fee');
            Session::forget('cart');
            return redirect()->route('home')->with('message', 'Thanh toán sản phẩm thành công!');
        } catch (\Exception $e) {
            return redirect()->route('home')->with('message', 'Có lỗi xảy ra!');
        }
    }

    public function edit_customer($id)
    {
        $title ='Chỉnh sửa thông tin';
        $category = Category::where('category_status', '1')->orderby('category_id', 'desc')->get();
        $brand = Brand::where('brand_status', '1')->orderby('brand_id', 'desc')->get();
        $categorypost = CategoryPost::where('cate_post_status', '1')->orderby('cate_post_id', 'desc')->get();
        $slider = Slider::where('slider_status', '1')->take(4)->get();
        $customer = Customer::find($id);
        return view('pages.customer.edit_customer', compact('category', 'brand', 'categorypost', 'title' ,'slider', 'customer'));
    }
}
