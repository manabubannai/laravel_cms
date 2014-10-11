{{ Form::open(['url' => 'search','method'=>'get']) }}
    <div class="row">
        <div class="small-8 large-8 column">
            {{ Form::text('s',Input::old('username'),['placeholder'=>'ブログ内検索']) }}
        </div>
            {{ Form::submit('検索する',['class'=>'button tiny radius']) }}
    </div>
{{ Form::close() }}
<div>
    <h3>最近の記事</h3>
    <ul>
    @foreach($recentPosts as $post)
        <li>{{link_to_route('post.show',$post->title,$post->id)}}</li>
    @endforeach
    </ul>
</div>