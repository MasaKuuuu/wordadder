<?php

namespace App\Http\Controllers;

use App\Word;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WordController extends Controller
{
    //単語登録ページを表示するメソッド
    public function index(Request $request){
        $categorys = DB::table('words')->select('category')->distinct()->get();
        $today = date('Y-m-d');
        return view('add.index',['categorys'=>$categorys, 'today' => $today]);
    }

    //単語登録処理をするメソッド
    public function add(Request $request){
        
        //ユーザが入力した値をチェックして補正する
        $this->validate($request, Word::$rules);
        $form = $request->all();
        unset($form['_token']);
        
        //ログイン中のユーザ情報を取得します
        $user_id = Auth::user() -> id;
        $user_word_table_name = "word_table_" .$user_id;
        $form['user_name'] = Auth::user() -> name;
        
        //カテゴリが直接入力かリスト入力かを判別
        if($form['input_type'] == "direct"){
            $category = $form['direct_category'];
        }else{
            $category = $form['list_category'];
        }
        
        //同じ単語が登録されているかどうかをチェック
        $same_words = DB::table($user_word_table_name)->where('word',$form['word'])->get();
        
        if(count($same_words) == 0){
            unset($form['input_type']);
            unset($form['direct_category']);
            unset($form['list_category']);
            $form['category'] = $category;
            unset($form['is_same_word']);
            DB::table($user_word_table_name)->insert($form);
        
            return view('add.complete');
        } else {
            return view('add.same_word',['same_words' => $same_words,'input_word' => $form, 'category' => $category]);
        }
    }

    //登録済みの単語を登録するメソッド
    public function same(Request $request){          
        //ユーザが入力した値をチェックして補正する
        $this->validate($request, Word::$rules);
        $form = $request->all();
        unset($form['_token']);

        //ログイン中のユーザ情報を取得します
        $user_id = Auth::user() -> id;
        $user_word_table_name = "word_table_" .$user_id;
        $form['user_name'] = Auth::user() -> name;
        
        $form['category'] = $form['same_word_category'];
        unset($form['same_word_category']);
        unset($form['is_same_word']);
        DB::table($user_word_table_name)->insert($form);
        
        return view('add.complete');
    }
    
    
    //単語削除処理をするメソッド
    public function delete(Request $request){
        //ログイン中のユーザ情報を取得します
        $user_id = Auth::user() -> id;
        $user_word_table_name = "word_table_" .$user_id;
        
        $id = ['id' => $request->id];
        
        //クエリビルダを利用するケース
        DB::delete('delete from ' .$user_word_table_name. ' where id = :id', $id);
        $msg = "単語を削除しました";
        return redirect()->action('WordListController@index', ['msg'=>$msg]);
    }
    
}
