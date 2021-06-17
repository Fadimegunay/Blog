<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function login(Request $request){
        $email = $request->input('email');
        $password = md5($request->input('password'));
        $user = User::where([
                        'email' => $email,
                        'password' => $password,
                        'is_active' => true
                    ])->first();
        
        if($user == null){
            return  redirect()->route('login')->with('message', 'E-Posta veya Parola hatalı!');
        }
        Auth::login($user);
        $request->session()->put('user',$user->id);
        
        return redirect()->route('home');
    }

    public function logout(Request $request){
        $request->session()->forget('user');
        return redirect()->route('login');
    }
}
