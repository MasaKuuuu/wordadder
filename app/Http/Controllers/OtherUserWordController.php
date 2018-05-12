<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class OtherUserWordController extends Controller
{
    public function index(Request $request){
        $user_id = DB::select("SELECT id FROM users");
        $users_word_table_name = array();
        $sql = array();
        $word = array();
        
        for($i = 0; $i < count($user_id); $i++){
            $users_word_table_name[$i] = "word_table_" .$user_id[$i]->id;
        }
        
        for ($j = 0 ; $j < count($user_id); $j++){
            $sql[$j] = "SELECT * FROM " .$users_word_table_name[$j]. " WHERE word = :word";
        }

        for ($z = 0 ; $z < count($user_id); $z++){
            $word[$z] = $request->word;
        }
        
        $query = implode(" UNION ALL ", $sql);
        
        $words = ['word' => $request->word,'word' => $request->word];
        
        $words = DB::select($query,$words);
        
        return view('word_list.other_user_word',['words'=>$words]);
        
    }
}
