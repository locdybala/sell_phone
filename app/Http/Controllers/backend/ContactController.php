<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ContactController extends Controller
{
    public function index() {
        $contact = Contact::find(1);
        return view('backend.contact.index',compact('contact'));
    }

    public function create() {
        $title = 'Cấu hình website';
        $contact = Contact::find(1);
        return view('backend.contact.update',compact('contact','title'));
    }


    public function update(Request $request, $id) {
        $data = $request->all();
        $contact = Contact::find($id);
        $contact['info_contact'] = $data['info_name'];
        $contact['info_map'] = $data['info_map'];
        $file = $request->file('image');
        if ($file) {
            $getnameimage = $file->getClientOriginalName();
            $nameimage = current(explode('.', $getnameimage));
            $new_image = $nameimage . rand(0, 99) . '.' . $file->getClientOriginalExtension();
            $file->move('upload/info', $new_image);
            $contact['info_image'] = $new_image;

        }
        $contacts = $contact->save();
        if ($contacts) {
            Session::put('success', 'Sửa thông tin thành công');
            return redirect()->route('add_infomation');
        } else {
            Session::put('message', 'Sửa thông tin thất bại');
            return redirect()->route('add_infomation');
        }
    }
}
