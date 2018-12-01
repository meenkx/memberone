<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductLineTable extends Migration {

	public function up()
	{
		Schema::create('ProductLine', function(Blueprint $table) {
			$table->increments('ProductLineId');
			$table->text('ProductName');
			$table->datetime('UpdateTimestamps');
		});
	}

	public function down()
	{
		Schema::drop('ProductLine');
	}
}