<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMetabolitiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('metabolites', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('cluster');
			$table->string('metabolite');
			$table->integer('idToxicity');
			$table->integer('idOrganism');
			$table->string('criteria');
			$table->string('completeness');
			$table->integer('valid');
			$table->string('link');
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
		Schema::drop('metabolites');
	}

}
