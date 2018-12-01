<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePromotionTable extends Migration {

	public function up()
	{
		Schema::create('Promotion', function(Blueprint $table) {
			$table->increments('PromotionId');
			$table->text('PromotionName');
			$table->integer('StampPromotion');
			$table->integer('PointPromotion');
			$table->integer('PromotionCount');
			$table->datetime('PromotionDate');
		});
	}

	public function down()
	{
		Schema::drop('Promotion');
	}
}