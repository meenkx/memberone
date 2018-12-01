<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFacebookTable extends Migration {

	public function up()
	{
		Schema::create('Facebook', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('CustomerId')->unsigned()->nullable();
			$table->string('FacebookId', 190);
			$table->string('FacebookFirstname', 190);
			$table->string('FacebookLastname', 190);
			$table->text('FacebookAvatar');
		});
	}

	public function down()
	{
		Schema::drop('Facebook');
	}
}