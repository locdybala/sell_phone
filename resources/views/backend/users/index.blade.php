@extends('backend.admin_layout')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Trang chủ /</span> Danh sách tài khoản</h4>
        @php
            $message=Session::get('message');

            if($message){
                echo '<div class="alert alert-danger">
                          '.$message.'
                        </div>';
                Session::put('message', null);

                                 }
        @endphp

        @php
            $success=Session::get('success');
            if($success){
            echo '<div class="alert alert-success">
                 '.$success.'
               </div>';
            Session::put('success', null);}
        @endphp
        {{--        <a href="{{ route('add_order') }}" class="btn btn-success mb-2">Thêm tài khoản</a>--}}
        <div class="card">
            <h5 class="card-header">Danh sách tài khoản</h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th style="width:20px;">
                            <label class="i-checks m-b-none">
                                <input type="checkbox"><i></i>
                            </label>
                        </th>
                        <th>STT</th>
                        <th>Tên user</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Author</th>
                        <th>Admin</th>
                        <th>User</th>
                        <th style="width:30px;"></th>


                        <th style="width:30px;"></th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @php
                        $i = 0;
                    @endphp
                    @if ($user)
                        @foreach($user as $key => $user)
                            @php
                                $i++;
                            @endphp
                            <form action="{{route('assign_roles')}}" method="POST">
                                @csrf
                                <tr>
                                    <td><label class="i-checks m-b-none"><input type="checkbox"
                                                                                name="post[]"><i></i></label></td>
                                    <td>{{$i}}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }} <input type="hidden" name="admin_email"
                                                                  value="{{ $user->email }}"></td>
                                    <td>{{ $user->password }}</td>
                                    <td><input type="checkbox"
                                               name="author_role" {{$user->hasRole('author') ? 'checked' : ''}}></td>
                                    <td><input type="checkbox"
                                               name="admin_role" {{$user->hasRole('admin') ? 'checked' : ''}}></td>
                                    <td><input type="checkbox"
                                               name="user_role" {{$user->hasRole('user') ? 'checked' : ''}}></td>

                                    <td>
                                        <input type="submit" value="Phân quyền" class="btn btn-sm btn-outline-secondary">
                                        <a onclick="return confirm('Bạn có muốn xóa user này không')"
                                           href="{{ url('/admin/deleteUser_role/'.$user->id) }}"
                                           class="btn btn-sm btn-outline-dark">Xóa</a>
                                        <br>
                                        <a href="{{ url('/admin/impersonate/'.$user->id) }}"
                                           class="btn btn-sm mt-2 btn-outline-primary">Chuyển quyền</a>
                                    </td>

                                </tr>
                            </form>
                        @endforeach
                    @else
                        <td>Không có dữ liệu</td>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
        <!--/ Hoverable Table rows -->
    </div>
@endsection
