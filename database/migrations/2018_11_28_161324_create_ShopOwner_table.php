<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateShopOwnerTable extends Migration {

	public function up()
	{
		Schema::create('ShopOwner', function(Blueprint $table) {
			$table->increments('ShopOwnerId');
			$table->text('ShopName');
			$table->text('ShopAddress');
			$table->text('QRcodeShop');
			$table->text('MapShopOwner');
			$table->datetime('ShopUpdateTimestamps');
		});
	}

	public function down()
	{
		Schema::drop('ShopOwner');
	}
}