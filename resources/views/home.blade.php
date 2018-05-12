@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">単語を登録しましょう</div>

                <div class="panel-body">
                
                <form class="form-horizontal"  action="add" method="post">
				{{ csrf_field() }}
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if($errors->has('word'))
                		{{$errors->first('word')}}
                	@endif
                	
                	    <div class="form-group{{ $errors->has('word') ? ' has-error' : '' }}">
                            <label for="word" class="col-md-4 control-label">単語</label>

                            <div class="col-md-6">
                                <input id="word" type="text" class="form-control" name="word" value="{{ old('word') }}" placeholder="単語" required autofocus>

                                @if ($errors->has('word'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('word') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                	    <div class="form-group{{ $errors->has('discription') ? ' has-error' : '' }}">
                            <label for="discription" class="col-md-4 control-label">説明</label>

                            <div class="col-md-6">
                                <textarea id="discription" class="form-control" name="discription" value="{{ old('discription') }}" placeholder="単語の説明" required autofocus></textarea>

                                @if ($errors->has('discription'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('discription') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                	
                	    <div class="form-group{{ $errors->has('categorys') ? ' has-error' : '' }}">
                            <label for="categorys" class="col-md-4 control-label">カテゴリ</label>

                            <div class="col-md-6">
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('categorys') ? ' has-error' : '' }}">
                            <label for="categorys" class="col-md-4 control-label">
	                            <input type="radio" name="input_type" value="direct" id="direct" checked>
                            </label>

                            <div class="col-md-6">                        	
                            	<input id="direct_category" type="text" class="form-control" name="direct_category" value="{{ old('direct_category') }}" placeholder="カテゴリ名を新規に登録" required autofocus>
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('categorys') ? ' has-error' : '' }}">
                            <label for="categorys" class="col-md-4 control-label">
	                            <input type="radio" name="input_type" value="list" id="list">
                            </label>

                            <div class="col-md-6">
                                <select name="list_category" class="form-control">
                               		<option value="">登録履歴から選択選択</option>
                               		@if($categorys)
                                    	@foreach($categorys as $category)
                                    		<option value="{{$category->category}}">{{$category->category}}</option>
                                		@endforeach
                                	@endif
                            	</select>
                            </div>
                        </div>
     
                     	<div class="form-group{{ $errors->has('word') ? ' has-error' : '' }}">
                            <label for="word" class="col-md-4 control-label">登録日</label>

                            <div class="col-md-6">
                            <input type="date" id="date" name="add_date" class="form-control" value="{{$today}}">
                                @if ($errors->has('add_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('add_date') }}</strong>
                                    </span>
                                @endif

                            </div>
                        </div>
                
                	<div class="col-md-8 col-md-offset-4">
                		<input type="hidden" name="is_same_word" value=false>
                		<input type="submit" class="btn btn-primary" value="送信">
                	</div>
                	</form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
