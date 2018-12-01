<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHistoryTransactionTable extends Migration {

	public function up()
	{
		Schema::create('HistoryTransaction', function(Blueprint $table) {
			$table->increments('HistoryTransactionId');
			$table->integer('CustomerId')->unsigned();
			$table->integer('ShopOwnerId')->unsigned();
			$table->integer('StampHT');
			$table->integer('PointHT');
			$table->enum('ActionHT', array('create', 'delete'));
			$table->enum('StatusHT', array('active', 'not_active', 'donate', 'transfer_to_friend'));
			$table->datetime('HTActivityTimestamps');
		});
	}

	public function down()
	{
		Schema::drop('HistoryTransaction');
	}
}