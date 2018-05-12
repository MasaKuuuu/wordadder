<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'user_name' => 'required|string|max:255',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        //ユーザ登録時にユーザ用のテーブルを作成
        $user_id = DB::table('users')->max('id');
        $user_table_id = $user_id + 1;
        $user_table_name = "word_table_". $user_table_id;
        Schema::create($user_table_name, function(Blueprint $table){
            $table->increments('id');
            $table->string('word');
            $table->string('discription')->nullable();
            $table->string('category')->nullable();
            $table->string('add_date');
            $table->string('user_name');
            $table->rememberToken();
            $table->timestamps();
        });
        
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'user_name' => $data['user_name'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
