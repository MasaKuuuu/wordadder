<?php

namespace App\Http\Controllers;

use App\Word;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WordListController extends Controller
{
    public function index(Request $request){
        
            //Eloquant を利用するケース
//             $words = Word::all();
            
            //クエリビルダを利用するケース
            $user_id = Auth::user() -> id;
            $user_word_table_name = "word_table_" .$user_id;
            $words = DB::table($user_word_table_name)->get();
            $msg = "登録した単語一覧です";
            return view('word_list.index',['words' => $words, "msg" => $msg]);
        
    }
}
