@extends('layouts.loginTemplate')

@section('title','アカウント作成画面')

@section('content')
	<form action="create_account" method="POST">
	{{ csrf_field() }}
    	<p>ＩＤ：<input type="text" name="name"></p>
    	<p>PASS:<input type="password" name="password"></p>
    	<p>Email:<input type="text" name="email"></p>
    	<p>ニックネーム:<input type="text" name="user_name"></p>
    	<p><input type="submit" value="アカウント作成"></p>
    </form>
@endsection

@section('footer')
copyright 2017 Kuyama.
@endsection