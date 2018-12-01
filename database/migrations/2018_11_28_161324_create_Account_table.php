<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccountTable extends Migration {

	public function up()
	{
		Schema::create('Account', function(Blueprint $table) {
			$table->increments('CustomerId');
			$table->text('FirstName');
			$table->text('LastName');
			$table->text('Address');
			$table->date('DOB');
			$table->string('Telephone', 15);
			$table->enum('AccountStatus', array('active', 'notactive'));
			$table->text('ReferenceCode');
			$table->text('ReferenceQRcode');
			$table->datetime('AccountStatusTimestamps');
		});
	}

	public function down()
	{
		Schema::drop('Account');
	}
}