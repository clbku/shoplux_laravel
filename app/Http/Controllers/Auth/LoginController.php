<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\SignInRequest;
use App\Http\Requests\User\StoreUserRequest;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function getSignIn() {
        return view('pages.sign-in');
    }
    public function getSignUp() {
        return view('pages.sign-up');
    }
    public function postAddUser(StoreUserRequest $request) {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->gender = $request->gender;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->status = 1;
        $user->save();

        return redirect()->route('sign-in')->with('success', 'Tạo tài khoản thành công!');
    }
    public function postSignIn (SignInRequest $request) {

        $credentials = array('email'=>$request->email,'password'=>$request->password);
        $user = User::where([
            ['email','=',$request->email]
        ])->first();

        if($user){
            if(Auth::attempt($credentials)){
                if (Auth::user()->type == 0)
                    return redirect()->route('homepage');
                else if (Auth::user()->type == 1)
                    return redirect()->route('admin.index');
            }
            else{
                return redirect()->back()->with(['flag'=>'danger','message'=>'Đăng nhập không thành công']);
            }
        }
        else{
            return redirect()->back()->with(['flag'=>'danger','message'=>'Tài khoản chưa kích hoạt']);
        }
    }
    public function getSignOut() {
        Auth::logout();
        return redirect()->back();
    }
}
