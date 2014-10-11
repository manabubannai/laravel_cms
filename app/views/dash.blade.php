<div class="small-3 large-3 column">
	<aside class="sidebar">
		<h3>メニュー</h3>
		<ul class="side-nav">
			<li>{{HTML::link('/','Home')}}</li>
			<li class="divider"></li>
			<li class="{{ (strpos(URL::current(),route('post.new'))!== false) ? 'active' : '' }}">
				{{HTML::linkRoute('post.new','新規投稿')}}
			</li >
			<li class="{{ (strpos(URL::current(),route('post.list'))!== false) ? 'active' : '' }}">
				{{HTML::linkRoute('post.list','記事一覧')}}
			</li>
			<li class="divider"></li>
			<li class="{{ (strpos(URL::current(),route('comment.list'))!== false) ? 'active' : '' }}">
				{{HTML::linkRoute('comment.list','コメント一覧')}}
			</li>
		</ul>
	</aside>
</div>
<div class="small-9 large-9 column">
	<div class="content">
		<!-- foundationのReveal Modal pluginがajaxをサポートしています -->
		<!-- 最後のdiv要素はAjaxでコンテンツを出力しますが、これはfoundationのReveal Modal pluginが利用されています -->
		@if(Session::has('success'))
		<div data-alert class="alert-box round">
			{{Session::get('success')}}
			<a href="#" class="close">&times;</a>
		</div>
		@endif
		{{$content}}
	</div>
	<div id="comment-show" class="reveal-modal small" data-reveal>
		{{-- Ajaxを利用 --}}
	</div>
</div>