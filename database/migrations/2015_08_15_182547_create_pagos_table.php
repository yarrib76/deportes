<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pagos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
            $table->double('costo');
            $table->string('title')->nullable();
            $table->dateTime('start')->nullable();
            $table->dateTime('end');

            $table->integer('actividadAsignada_id')->unsigned();
            $table->foreign('actividadAsignada_id')->references('id')->on('actividades_asignadas');


        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pagos');
	}

}
