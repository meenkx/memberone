<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCustomerCommentShopTable extends Migration {

	public function up()
	{
		Schema::create('CustomerCommentShop', function(Blueprint $table) {
			$table->increments('CommentId');
			$table->integer('CustomerId')->unsigned();
			$table->text('CommentDetail');
			$table->datetime('CommentDate');
		});
	}

	public function down()
	{
		Schema::drop('CustomerCommentShop');
	}
}