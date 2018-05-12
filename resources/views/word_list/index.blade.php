@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
            
            	@if($msg != null)
            	<div class="panel-heading">{{ $msg }}</div>
            	@else
            	<div class="panel-heading">単語登録が完了しました</div>
            	@endif
            
                <div class="panel-body">
                	<div class="">
    	            	@if(count($words) > 0)
                            <table class="table">
                            <tr>
                            	<th>単語</th><th>説明</th><th>カテゴリ</th><th>登録日</th><th></th><th></th>
                            </tr>
                            @foreach($words as $word)
                            <tr>
                            	<td>{{$word->word}}</td><td>{{$word->discription}}</td><td>{{$word->category}}</td><td>{{$word->add_date}}</td><td><a class="btn btn-info" href="other_user_word_list?word={{$word->word}}">閲覧</a></td><td><a class="btn btn-warning" href="delete?id={{$word->id}}">削除</a></td>
                            </tr>
                    		@endforeach
                    		</table>
						@else
							<div class ="" >単語は登録されていません。</div>
						@endif
					</div>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection

