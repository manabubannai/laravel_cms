<div class="small-6 large-6 column login-form">

@if(Session::has('success'))
    <div data-alert class="alert-box round">
        {{Session::get('success')}}
        <a href="#" class="close">&times;</a>
    </div>
@endif

<p>デフォルト：id->hogehoge, pass->admin</p>
		{{ Form::open(['action' => 'BlogController@postLogin']) }}
		<fieldset>
			<legend>ログインページ</legend>
			{{ Form::label('username','ユーザー名') }}
			{{ Form::text('username',Input::old('username'),['placeholder'=>'ユーザー名']) }}
			{{ Form::label('password','パスワード') }}
			{{ Form::password('password',['placeholder'=>'パスワード']) }}
			{{ Form::submit('ログイン',['class'=>'button tiny radius']) }}
		</fieldset>
		{{ Form::close() }}
		@if($errors->has())
			@foreach ($errors->all() as $message)
				<span class="label alert round">{{$message}}</span><br><br>
			@endforeach
		@endif
		@if(Session::has('failure'))
			<span class="label alert round">{{Session::get('failure')}}</span>
		@endif
</div>

