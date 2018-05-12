<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user() -> id;
        $user_word_table_name = "word_table_" .$user_id;
        $categorys = DB::table($user_word_table_name)->select('category')->distinct()->get();
        $today = date('Y-m-d');
        return view('home',['categorys'=>$categorys, 'today' => $today]);
    }
}
