@extends('layouts.addTemplate')

@section('title','Index')

@section('form')

	@if($errors->has('word'))
	{{$errors->first('word')}}
	@endif
	<div class="word">
		単語：<input type="text" name="word">
	</div>
	
	<div class="discription">
		説明：<input type="text" name="discription">
	</div>
	
	<div class="category">
		カテゴリ：<br>
    	<input type="radio" name="input_type" value="direct" id="direct" checked>
    	<label for="direct">直接入力</label>
    	<input type="text" name="direct_category"><br>
    	<input type="radio" name="input_type" value="list" id="list">
    	<label for="list">リストから選択(これまで入力したもの)</label>
    	<select name="list_category">
   		<option value="">以下より選択</option>
   		@if($categorys)
        	@foreach($categorys as $category)
        		<option value="{{$category->category}}">{{$category->category}}</option>
    		@endforeach
    	@endif
    	</select>
	</div>
	
	<div class="add_day">
		登録日：
		<input type="date" name="add_date" value="{{$today}}">
	</div>

	<div>
		<input type="hidden" name="is_same_word" value=false>
		<input type="submit" value="送信">
	</div>
	
	<div>
		<a href="top">メニューへ戻る</a>
	</div>
	
@endsection

@section('footer')
copyright 2017 Kuyama.
@endsection