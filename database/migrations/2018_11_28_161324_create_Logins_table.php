<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLoginsTable extends Migration {

	public function up()
	{
		Schema::create('Logins', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('CustomerId')->unsigned();
			$table->text('Email');
			$table->string('Password', 190);
			$table->text('remember_token');
			$table->datetime('AccountTimestamps');
		});
	}

	public function down()
	{
		Schema::drop('Logins');
	}
}