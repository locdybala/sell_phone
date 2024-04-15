<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Roles;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $title = 'Danh sách user';
        $user = User::paginate(5);
        return view('backend.users.index')->with(compact('user','title'));
    }

    public function assign_roles(Request $request)
    {
        $data = $request->all();
        $user = User::where('email', $data['admin_email'])->first();
        $user->roles()->detach();
        if ($request['author_role']) {
            $user->roles()->attach(Roles::where('name', 'author')->first());
        }
        if ($request['user_role']) {
            $user->roles()->attach(Roles::where('name', 'user')->first());
        }
        if ($request['admin_role']) {
            $user->roles()->attach(Roles::where('name', 'admin')->first());
        }
        return redirect()->back();
    }

    public function deleteUser_role($id){
        if(Auth::id()==$id){
            return redirect()->back()->with('message','Không được xóa chính mình');
        }
        $user=User::find($id);
        if($user){
            $user->roles()->detach();
            $user->delete();
        }

        return redirect()->back()->with('success','Xóa user thành công');

    }

    //Chuyển quyền
    public function impersonate($id){
        $user=User::where('id',$id)->first();
        if($user){
            session()->put('impersonate',$user->id);
        }
        return redirect('/admin/all_user');
    }
    public function impersonate_destroy(){
        session()->forget('impersonate');
        return redirect('/admin/all_user');
    }
}
