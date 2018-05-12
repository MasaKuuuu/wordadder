@extends('layouts.loginTemplate')

@section('title','ログイン画面')

@section('content')
	<p>{{$msg}}</p>
	<form action="login" method="post">
	{{ csrf_field() }}
    	<p>ID:<input type="text" name="name"></p>
    	<p>PASS:<input type="password" name="password"></p>
    	<p><input type="submit" value="ログイン"></p>
	</form>
	<a href="create_account">アカウント新規作成</a>
@endsection

@section('footer')
copyright 2017 Kuyama.
@endsection