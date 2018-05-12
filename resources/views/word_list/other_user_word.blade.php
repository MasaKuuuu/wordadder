@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
            
            	<div class="panel-heading">ほかの人が登録した単語の一覧です</div>
            
                <div class="panel-body">
                	<div class="">
    	            	@if(count($words) > 0)
                            <table class="table">
                            <tr>
                            	<th>登録者名</th><th>単語</th><th>説明</th><th>カテゴリ</th><th>登録日</th>
                            </tr>
                            @foreach($words as $word)
                            <tr>
                            	<td>{{$word->user_name}}</td><td>{{$word->word}}</td><td>{{$word->discription}}</td><td>{{$word->category}}</td><td>{{$word->add_date}}</td>
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