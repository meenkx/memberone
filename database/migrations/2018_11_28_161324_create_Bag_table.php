<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBagTable extends Migration {

	public function up()
	{
		Schema::create('Bag', function(Blueprint $table) {
			$table->increments('Bag');
			$table->integer('CustomerId')->unsigned();
			$table->integer('HistoryTransactionId')->unsigned()->nullable();
			$table->datetime('BagActivityTimestamps');
		});
	}

	public function down()
	{
		Schema::drop('Bag');
	}
}