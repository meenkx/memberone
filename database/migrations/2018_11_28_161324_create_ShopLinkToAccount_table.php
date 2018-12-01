<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateShopLinkToAccountTable extends Migration {

	public function up()
	{
		Schema::create('ShopLinkToAccount', function(Blueprint $table) {
			$table->increments('ShopLinkAccountID');
			$table->integer('ShopOwnerId')->unsigned();
			$table->integer('EmployeeId')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('ShopLinkToAccount');
	}
}