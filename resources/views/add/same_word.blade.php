@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
            
            	<div class="panel-heading">同じ単語が登録されています</div>
            	            
                <div class="panel-body">
                	<div class="">

	                	<p>今回登録した単語</p>
                        <table class="table">
                        <tr>
                        	<th>単語</th><th>説明</th><th>カテゴリ</th><th>登録日</th>
                        </tr>
                        <tr>
                        	<td>{{$input_word['word']}}</td><td>{{$input_word['discription']}}</td><td>{{$category}}</td><td>{{$input_word['add_date']}}</td>
                        </tr>
                        </table>
                        
                        <p>登録済みの単語</p>
                        
                        <table class="table" style="border-collapse: collapse" border=1>
                        <tr>
                        	<th>単語</th><th>説明</th><th>カテゴリ</th><th>登録日</th>
                        </tr>
                        
                        @foreach($same_words as $same_word)
                        <tr>
                        	<td>{{$same_word->word}}</td><td>{{$same_word->discription}}</td><td>{{$same_word->category}}</td><td>{{$same_word->add_date}}</td>
                        </tr>
                        @endforeach
                        </table>
                        <form class="form-horizontal" action="same" method="post">
                        {{ csrf_field() }}
                            <input type="hidden" name="word" value="{{$input_word['word']}}">
                            <input type="hidden" name="discription" value="{{$input_word['discription']}}">
                            <input type="hidden" name="same_word_category" value="{{$category}}">
                            <input type="hidden" name="add_date" value="{{$input_word['add_date']}}">
                            <input type="hidden" name="is_same_word" value=true>
                            <input type="submit" value="別の単語として登録する">
                        </form>
                        <a href="home">単語登録に戻る</a>                       
					</div>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection

