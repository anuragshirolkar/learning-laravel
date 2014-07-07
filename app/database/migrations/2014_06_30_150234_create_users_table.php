<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('username', 50);
			$table->string('email',200);
			$table->string('name', 200);
			$table->string('password', 60);
			$table->string('phone', 20);
			$table->string('address',1000);
			$table->string('town', 50);
			$table->string('state', 50);
			$table->integer('pincode');
			$table->text('orders');
			$table->text('cart');
			$table->boolean('admin')->default(false);
			$table->string('remember_token', 100);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
