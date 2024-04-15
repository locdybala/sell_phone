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
        $customer = Customer::all();
        return view('backend.customer.index',compact('customer','title'));
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
}
