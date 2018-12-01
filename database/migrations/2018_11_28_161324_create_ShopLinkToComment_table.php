<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateShopLinkToCommentTable extends Migration {

	public function up()
	{
		Schema::create('ShopLinkToComment', function(Blueprint $table) {
			$table->increments('ShopLinkAccountID');
			$table->integer('ShopOwnerId')->unsigned();
			$table->integer('CommentId')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('ShopLinkToComment');
	}
}