<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\User\StoreRequest;

class LoginController extends Controller
{
    public function templateLogin()
    {
        return view('login');
    }
    public function login(Request $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];
    
        // Thêm điều kiện kiểm tra trạng thái người dùng
    
        if (Auth::attempt($data)) {
            return redirect()->route('admin.booking.index');
        } else {
            return redirect()->route('login')->with('error', 'Tài khoản hoặc mật khẩu chưa chính xác');
        }
    }
    
    public function Logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}