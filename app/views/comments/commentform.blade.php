<div id="reply">
    <h2>コメントを残す</h2>
    @if(Session::has('success'))
        <div data-alert class="alert-box round">
            {{Session::get('success')}}
            <a href="#" class="close">&times;</a>
        </div>
    @endif
    {{ Form::open(['route'=>['comment.new',$post->id]]) }}
        <div class="row">
            <div class="small-5 large-5 column">
                {{ Form::label('commenter','名前：') }}
                {{ Form::text('commenter',Input::old('commenter')) }}
            </div>
        </div>
        <div class="row">
            <div class="small-5 large-5 column">
                {{ Form::label('email','Email：') }}
                {{ Form::text('email',Input::old('email')) }}
            </div>
        </div>
        <div class="row">
            <div class="small-7 large-7 column">
                {{ Form::label('comment','コメント：') }}
                {{ Form::textarea('comment',Input::old('comment'),['rows'=>5]) }}
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
    {{ Form::submit('送信する',['class'=>'button tiny radius']) }}
    {{ Form::close() }}
</div>
