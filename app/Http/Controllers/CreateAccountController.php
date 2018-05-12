<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Exception;


class CreateAccountController extends Controller
{
    public function index(Request $request){
        return view('create_account.index');
    }
    
    public function create(Request $request){
        try{
            $user = new User;
            $form = $request->all();
            unset($form['_token']);
            $user->fill($form)->save();
            return redirect('login');
        }catch(Exception $e){
            echo "データベースエラー";
            return redirect('login');
        }
    }
}
