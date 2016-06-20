<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateToxicityTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('toxicity', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('nivel');
			$table->string('description');
			$table->integer('environment');
			$table->integer('animals');
			$table->integer('humans');
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
		Schema::drop('toxicity');
	}

}
