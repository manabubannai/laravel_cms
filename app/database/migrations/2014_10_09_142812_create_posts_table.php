<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posts', function($table){
			$table->increments('id');
			// $table->unsignedInteger('author_id');
			// $table->foreign('author_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

			$table->string('title');
			$table->string('read_more');
			$table->text('content');
			$table->unsignedInteger('comment_count');
			$table->timestamps();
			$table->engine = 'MyISAM';
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('posts');
	}

}
