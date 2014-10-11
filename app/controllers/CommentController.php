<?php

class CommentController extends BaseController{

public function listComment(){
	$comments = Comment::orderBy('id', 'desc')->paginate(20);
	$this->layout->title = 'コメント一覧';
	$this->layout->main = View::make('dash')->nest('content', 'comments.list', compact('comments'));
}

public function newComment(Post $post){
	$comment = [
		'commenter' => Input::get('commenter'),
		'email' => Input::get('email'),
		'comment' => Input::get('comment'),
	];
	$rules = [
		'commenter' => 'required',
		'email' => 'required|email',
		'comment' => 'required',
	];

	$valid = Validator::make($comment, $rules);
	if ($valid->passes()) {
		$comment = new Comment($comment);
		$comment->approved = 'no';
		$post->comments()->save($comment);

		return Redirect::to(URL::previous().'#reply')->with('success', 'コメントが送信されました。現在は承認待ちです。');
	}else{
		return Redirect::to(URL::previous().'#reply')->withErrors($valid)->withInput();
	}
}

public function showComment(Comment $comment){
	if (Request::ajax()) {
		return View::make('comments.show', compact('comment'));
	}
}

public function deleteComment(Comment $comment){
	$post = $comment->post;
	$status = $comment->approved;
	$comment->delete();
	($status === 'yes') ? $post->decrement('comment_count') : '';
	return Redirect::back()->with('success', 'コメントが削除されました');
}

public function updateComment(Comment $comment){
	$comment->approved = Input::get('status');
	$comment->save();
	$comment->post->comment_count = Comment::where('post_id', '=', $comment->post->id)->where('approved', '=', 1)->count();
	$comment->post->save();
	return Redirect::back()->with('success', 'Comment'. (($comment->approved === 'yes') ? 'Approved' : 'Disapproved'));
}

}













