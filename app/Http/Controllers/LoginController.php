<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('guest',['only'=>['index']]);
    }

    public function index()
    {
        return view('admin.login');
    }

    public function postLogin(Request $request)
    {
        if (Auth::attempt([
            'username' => $request->username,
            'password' => $request->password,
        ])){
            return redirect(route('dashboard'));
        }else{
            return redirect(route('login.index'));
        }
    }
}
