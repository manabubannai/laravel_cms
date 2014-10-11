<?php
class Post extends Eloquent{

	protected $fillable = ['title', 'content'];

	public function comments(){
		return $this->hasMany('Comment');
	}

	// public function user(){
	// 	return $this->belongsTo('User');
	// }

}
