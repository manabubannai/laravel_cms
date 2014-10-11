<h2 class="edit-post">
	記事の編集
	<span class="right">{{ HTML::linkRoute('post.list','キャンセル',null,['class' => 'button tiny radius']) }}</span>
</h2>
<hr>
{{ Form::open(['route'=>['post.update',$post->id]]) }}
<div class="row">
	<div class="small-5 large-5 column">
		{{ Form::label('title','タイトル:') }}
		{{ Form::text('title',Input::old('title',$post->title)) }}
	</div>
</div>
<div class="row">
	<div class="small-7 large-7 column">
		{{ Form::label('content','本文:') }}
		{{ Form::textarea('content',Input::old('content',$post->content),['rows'=>5]) }}
	</div>
</div>
@if($errors->has())
@foreach($errors->all() as $error)
<div data-alert class="alert-box warning round">
	{{$error}}
	<a href="#" class="close">&times;</a>
</div>
@endforeach
@endif
{{ Form::submit('更新する',['class'=>'button tiny radius']) }}
{{ Form::close() }}
