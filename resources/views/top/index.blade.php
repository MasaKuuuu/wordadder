@extends('layouts.homeTemplate')

@section('title','Index')

@section('menubar')
	@parent
	<a href="add">単語を登録する</a>
	<a href="word_list">登録済み単語</a>
	<a href="#">ログアウト</a>
@endsection

@section('content')
	<p>単語の登録ができます。</p>
	<p>上記メニューを選択してください。</p>
@endsection

@section('footer')
copyright 2017 Kuyama.
@endsection