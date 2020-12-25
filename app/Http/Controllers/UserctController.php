<?php

namespace App\Http\Controllers;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Slider;
use App\Models\Product;

class UserctController extends Controller
{
    public function getLogin()
    {


        if(Auth::check())
        {
            // nếu đăng nhập thành công thì
            return redirect()->route('home');
        }else{
            return view('users.dangnhap');
        }
    }

    public function postLogin(LoginRequest $request){
        $login =[
            'email'=>$request->email,
            'password'=>$request->password,
            'status'=>1
        ];
        if(Auth::attempt($login))
        {
            return redirect()->route('home');
        }else{
            return redirect()->back()->with('status','Email hoặc mật khẩu không chính xác');
        }


    }

    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('getLogin');
    }
    public function register(Request $request){
        // nhận từ request
        // $username = $request->get('username');
        // $password = $request->get('password');
        // $repassword = $request->get('repassword');
        // $email = $request->get('email');
        // if(isset($username)){

        // }


        return view('users.dangki');
    }

}
