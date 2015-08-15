<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActividadesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('actividades', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
            $table->string('nombre');
            $table->string('descripcion')->nullable();
            $table->string('club');
            $table->unique(['nombre','club']);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('actividades');
	}

}
