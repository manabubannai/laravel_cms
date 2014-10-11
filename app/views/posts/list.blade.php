<h2 class="post-listings">記事一覧</h2><hr>
<table>
    <thead>
    <tr>
        <th width="300">タイトル</th>
        <th width="120">編集</th>
        <th width="120">削除</th>
        <th width="120">閲覧</th>
    </tr>
    </thead>
    <tbody>
        @foreach($posts as $post)
            <tr>
                <td>{{$post->title}}</td>
                <td>{{HTML::linkRoute('post.edit','Edit',$post->id)}}</td>
                <td>{{HTML::linkRoute('post.delete','Delete',$post->id)}}</td>
                <td>{{HTML::linkRoute('post.show','View',$post->id,['target'=>'_blank'])}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
{{$posts->links()}}