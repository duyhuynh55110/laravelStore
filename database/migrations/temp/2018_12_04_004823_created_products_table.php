<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatedProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('manus', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name',200)->unique();
			$table->string('img',200);
			$table->double('price');
			$table->longText('desc');
			$table->integer('type_id')->references('id')->on('types')->onDelete('cascade');
			$table->integer('manu_id')->references('id')->on('manus')->onDelete('cascade');
			$table->rememberToken();
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
		//
	}

}
