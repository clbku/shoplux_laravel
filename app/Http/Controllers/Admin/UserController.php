<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\User\EditUserRequest;
use App\Http\Requests\User\StoreUserRequest;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function __construct(User $user) {
        $this->user = $user;
    }

    public function getUserList () {
        $users = $this->user->getUserList();
        return view('admin.user.list', compact('users'));
    }

    public function getAddUser() {
        return view('admin.user.add');
    }
    public function postAddUser(StoreUserRequest $request) {
        $user = new User();
        $user->name = $request->name;
        $user->gender = $request->gender;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->type = $request->type;
        $user->save();
        return redirect()->route('admin.user.list')->with('success', 'Thêm người dùng mới thành công');
    }
    public function getEditUser($id) {

        if ($id != Auth::user()->id) return redirect()->back()->with('wrong', 'Lỗi! Bạn không có quyền thay đổi người dùng này');
        $user = User::find($id);
        return view('admin.user.edit', compact('user'));
    }
    public function postEditUser($id, EditUserRequest $request) {
        $user = User::find($id);
        if (Hash::check($request->old_password, $user->password)) {
            $user->name = $request->name;
            $user->gender = $request->gender;
            $user->email = $request->email;
            if ($request->password) $user->password = Hash::make($request->password);
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->type = $request->type;
            $user->save();
            return redirect()->route('admin.user.list')->with('success', 'Sửa thông tin thành công');
        }
        else {
            return redirect()->back()->with('wrong', 'Lỗi! Mật khẩu không chính xác');
        }
    }
    public function getLockUser($id) {
        $user = User::find($id);
        if ($user->type == "1") {
            return redirect()->route('admin.user.list')->with('wrong', 'Bạn không có quyền xóa admin');
        }
        else if ($user->status == "Hoạt động") {
            $user->status = "Bị khóa";
            $user->save();
        }
        else if ($user->status == "Bị khóa") {
            $user->status = "Hoạt động";
            $user->save();
        }
        return redirect()->route('admin.user.list')->with('success', 'Người dùng đã bị khóa');
    }
    public function postFindUser(Request $request) {
        $users = $this->user->findUser($request);
        return view('admin.user.list', compact('users'));
    }
}
