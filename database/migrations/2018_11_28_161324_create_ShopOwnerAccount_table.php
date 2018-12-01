<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateShopOwnerAccountTable extends Migration {

	public function up()
	{
		Schema::create('ShopOwnerAccount', function(Blueprint $table) {
			$table->increments('EmployeeId');
			$table->text('EmployeeFirstname');
			$table->text('EmployeeLastname');
			$table->text('EmployeeAddress');
			$table->date('EmployeeDOB');
			$table->string('EmployeeTelephone', 15);
			$table->datetime('EmployeeAccountMovement');
		});
	}

	public function down()
	{
		Schema::drop('ShopOwnerAccount');
	}
}