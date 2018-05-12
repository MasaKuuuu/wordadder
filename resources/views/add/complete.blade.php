@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">単語登録が完了しました</div>

                <div class="panel-body">
                    <div class="">
    	                <a href="home">続けて単語を登録する</a>
    	            </div>
    				<div class="">
    					<a href="word_list">登録した単語一覧を表示する</a>
					</div>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
