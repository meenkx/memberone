<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductFromShopTable extends Migration {

	public function up()
	{
		Schema::create('ProductFromShop', function(Blueprint $table) {
			$table->increments('ProductFromShopId');
			$table->integer('ShopOwnerId')->unsigned();
			$table->integer('ProductLineId')->unsigned();
			$table->integer('PromotionId')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('ProductFromShop');
	}
}