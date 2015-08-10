<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgendaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('agenda', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
            $table->string('title')->nullable();
            $table->dateTime('start')->nullable();
            $table->dateTime('end');
            $table->string('url')->nullable();
            $table->string('allDay')->nullable();

            $table->integer('actividadAsignada_id')->unsigned();
            $table->foreign('actividadAsignada_id')->references('id')->on('actividades_asignadas')->onDelete('cascade');

        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('agenda');
	}

}
