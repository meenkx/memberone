<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('Bag', function(Blueprint $table) {
			$table->foreign('CustomerId')->references('CustomerId')->on('Account')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('Bag', function(Blueprint $table) {
			$table->foreign('HistoryTransactionId')->references('HistoryTransactionId')->on('HistoryTransaction')
						->onDelete('set null')
						->onUpdate('set null');
		});
		Schema::table('HistoryTransaction', function(Blueprint $table) {
			$table->foreign('CustomerId')->references('CustomerId')->on('Account')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('HistoryTransaction', function(Blueprint $table) {
			$table->foreign('ShopOwnerId')->references('ShopOwnerId')->on('ShopOwner')
						->onDelete('no action')
						->onUpdate('no action');
		});
		Schema::table('Logins', function(Blueprint $table) {
			$table->foreign('CustomerId')->references('CustomerId')->on('Account')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('ProductFromShop', function(Blueprint $table) {
			$table->foreign('ShopOwnerId')->references('ShopOwnerId')->on('ShopOwner')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('ProductFromShop', function(Blueprint $table) {
			$table->foreign('ProductLineId')->references('ProductLineId')->on('ProductLine')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('ProductFromShop', function(Blueprint $table) {
			$table->foreign('PromotionId')->references('PromotionId')->on('Promotion')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('Facebook', function(Blueprint $table) {
			$table->foreign('CustomerId')->references('CustomerId')->on('Account')
						->onDelete('set null')
						->onUpdate('set null');
		});
		Schema::table('ShopLinkToAccount', function(Blueprint $table) {
			$table->foreign('ShopOwnerId')->references('ShopOwnerId')->on('ShopOwner')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('ShopLinkToAccount', function(Blueprint $table) {
			$table->foreign('EmployeeId')->references('EmployeeId')->on('ShopOwnerAccount')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('ShopLinkToComment', function(Blueprint $table) {
			$table->foreign('ShopOwnerId')->references('ShopOwnerId')->on('ShopOwner')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('ShopLinkToComment', function(Blueprint $table) {
			$table->foreign('CommentId')->references('CommentId')->on('CustomerCommentShop')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('CustomerCommentShop', function(Blueprint $table) {
			$table->foreign('CustomerId')->references('CustomerId')->on('Account')
						->onDelete('no action')
						->onUpdate('no action');
		});
	}

	public function down()
	{
		Schema::table('Bag', function(Blueprint $table) {
			$table->dropForeign('Bag_CustomerId_foreign');
		});
		Schema::table('Bag', function(Blueprint $table) {
			$table->dropForeign('Bag_HistoryTransactionId_foreign');
		});
		Schema::table('HistoryTransaction', function(Blueprint $table) {
			$table->dropForeign('HistoryTransaction_CustomerId_foreign');
		});
		Schema::table('HistoryTransaction', function(Blueprint $table) {
			$table->dropForeign('HistoryTransaction_ShopOwnerId_foreign');
		});
		Schema::table('Logins', function(Blueprint $table) {
			$table->dropForeign('Logins_CustomerId_foreign');
		});
		Schema::table('ProductFromShop', function(Blueprint $table) {
			$table->dropForeign('ProductFromShop_ShopOwnerId_foreign');
		});
		Schema::table('ProductFromShop', function(Blueprint $table) {
			$table->dropForeign('ProductFromShop_ProductLineId_foreign');
		});
		Schema::table('ProductFromShop', function(Blueprint $table) {
			$table->dropForeign('ProductFromShop_PromotionId_foreign');
		});
		Schema::table('Facebook', function(Blueprint $table) {
			$table->dropForeign('Facebook_CustomerId_foreign');
		});
		Schema::table('ShopLinkToAccount', function(Blueprint $table) {
			$table->dropForeign('ShopLinkToAccount_ShopOwnerId_foreign');
		});
		Schema::table('ShopLinkToAccount', function(Blueprint $table) {
			$table->dropForeign('ShopLinkToAccount_EmployeeId_foreign');
		});
		Schema::table('ShopLinkToComment', function(Blueprint $table) {
			$table->dropForeign('ShopLinkToComment_ShopOwnerId_foreign');
		});
		Schema::table('ShopLinkToComment', function(Blueprint $table) {
			$table->dropForeign('ShopLinkToComment_CommentId_foreign');
		});
		Schema::table('CustomerCommentShop', function(Blueprint $table) {
			$table->dropForeign('CustomerCommentShop_CustomerId_foreign');
		});
	}
}