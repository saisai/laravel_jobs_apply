<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTbApply extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('tb_apply', function(Blueprint $table){
			$table->increments('id');
			$table->string('title', 500);
			$table->string('link', 500);
			$table->string('from_which_website', 500);
			$table->integer('apply');
			$table->integer('detail');
			$table->integer('apply_times');
			$table->integer('tb_detail_id');
			$table->integer('users_id');
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
		Schema::drop('tb_apply');
	}

}
