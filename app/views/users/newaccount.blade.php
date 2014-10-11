<div class="small-6 large-6 column login-form">
		@if($errors->has())
			@foreach ($errors->all() as $message)
				<span class="label alert round">{{$message}}</span><br><br>
			@endforeach
		@endif
		@if(Session::has('failure'))
			<span class="label alert round">{{Session::get('failure')}}</span>
		@endif

		{{ Form::open(['action' => 'BlogController@postCreate', 'files'=>true]) }}
		<fieldset>
			<legend>会員登録ページ</legend>
			{{ Form::label('username','ユーザー名') }}
			{{ Form::text('username',Input::old('username'),['placeholder'=>'ユーザー名']) }}

			{{ Form::label('email','Email') }}
            {{ Form::email('email') }}

			{{ Form::label('password','パスワード') }}
			{{ Form::password('password',['placeholder'=>'パスワード']) }}

			{{ Form::label('password_confirmation','パスワードの確認') }}
			{{ Form::password('password_confirmation',['placeholder'=>'パスワードの確認']) }}

			{{ Form::submit('登録する',['class'=>'button tiny radius']) }}
		</fieldset>

		{{ Form::close() }}

</div>

