<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTshirtsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tshirts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title', 200);
			$table->string('tags',200);
			$table->text('description');
			$table->string('styles', 200);
			$table->string('colors', 200);
			$table->string('fabric', 200);
			$table->string('sizes', 200);
			$table->string('wash_care', 200);
			$table->string('image', 200);
			$table->text('reviewid');
			$table->integer('popularity');
			$table->integer('price');
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
		Schema::drop('tshirts');
	}

}
