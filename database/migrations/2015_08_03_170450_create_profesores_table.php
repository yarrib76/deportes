<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfesoresTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('profesores', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();

            $table->softDeletes();

            $table->integer('actividad_id')->unsigned();
            $table->foreign('actividad_id')->references('id')->on('actividades')->onDelete('cascade');

            $table->integer('usuario_id')->unsigned();
            $table->foreign('usuario_id')->references('id')->on('users');

        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('profesores');
	}

}
