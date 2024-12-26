<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    public function login()
    {
        return view('auth.login');
    }
    public function login_post(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        if (Auth::attempt(['email' => $email, 'password' => $password])) {

            return redirect()->route('admin_dashboard')->with(['success' => 'Giriş Başarılı']);
        } else {

            return back()->with(['error' => 'E-posta veya şifre hatalı']);
        }

    }

     public function register()
     {
         return view('auth.register');
     }
    public function register_post(Request $request)
    {
        $user = new User();
        $user->name = $request->input('name');
        $user->surname = $request->input('surname');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->user_name = $request->input('user_name');
        $user->cafe_name = $request->input('cafe_name');
        $user->user_id = $request->input('user_id');
        $user->save();
        if ($user) {
            return redirect()->back()->with(['success' => 'Başarıyla kayıt oldunuz']);
        } else {
            return redirect()->back()->with(['error' => 'Kayıt sırasında bir hata oluştu']);
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
