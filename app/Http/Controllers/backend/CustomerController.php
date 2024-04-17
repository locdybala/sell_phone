<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    public function index() {
        $title = 'Danh sách khách hàng';
        $customers = Customer::paginate(5);
        return view('backend.customer.index',compact('customers','title'));
    }

    public function create()
    {
        $title = 'Thêm khách hàng';
        return view('backend.customer.add', compact('title'));
    }

    public function store(Request $request)
    {
        $data['customer_name'] = $request->customer_name;
        $data['customer_phone'] = $request->customer_phone;
        $data['customer_email'] = $request->customer_email;
        $data['customer_password'] = md5($request->customer_password);
        $data['customer_birthday'] = $request->customer_birthday;
        $data['customer_address'] = $request->customer_address;
        $data['customer_vip'] = $request->customer_vip;
        Customer::create($data);
        Session::put('success', 'Thêm khách hàng thành công');
        return redirect()->route('all_customer');
    }
    public function update(Request $request, $id,$admin) {
        Customer::find($id)->update([
            'customer_name' => $request->customer_name,
            'customer_email' => $request->customer_email,
            'customer_password' => md5($request->customer_password),
            'customer_birthday' => $request->customer_birthday,
            'customer_phone' => $request->customer_phone,
            'customer_address' => $request->customer_address,
        ]);
        Session::put('success', 'Sửa thông tin khách hàng thành công');
        if ($admin == 1) {
            return redirect()->route('all_customer');
        } else{
            return redirect()->route('edit_customer',['id' =>$id]);
        }
    }

    public function edit($id) {
        $title = 'Chỉnh sửa khách hàng';
        $customer = Customer::find($id);
        return view('backend.customer.update',compact('customer','title'));
    }

    public function delete($id)
    {
        Customer::find($id)->delete();
        Session::put('success', 'Xóa khách hàng thành công');
        return redirect()->route('all_customer');

    }
}
