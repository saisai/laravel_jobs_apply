<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSingaporeGumtreeSg extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
        Schema::create('singapore_gumtree_sg', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('title', 500);
            $table->string('link', 500);
            $table->string('time', 500);
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
        Schema::drop('singapore_gumtree_sg');
	}

}
