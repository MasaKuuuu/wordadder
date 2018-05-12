<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        $param = ['msg' => 'ログインしてください'];
        return view('login.index', $param);
    }
    
    public function login(Request $request){
        $name = $request->name;
        $password = $request->password;
        if(Auth::attempt(['name' => $name, 'password' => $password])){
             return view('top.index');
        }else{
            $msg = "ID もしくは PASSWORD が違います";
            return view('login.index',['msg' => $msg]);
        }
    }
    
}
