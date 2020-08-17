<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableToptaldotcom extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('toptaldotcom', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('title', 255);
            $table->string('link', 255);

        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('toptaldotcom');
	}

}
