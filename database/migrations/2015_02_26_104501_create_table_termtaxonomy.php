<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTermtaxonomy extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('term_taxonomy', function(Blueprint $table){
			$table->increments('term_taxonomy_id');
			$table->integer('term_id');
			$table->string('taxonomy', 500);
			$table->longText('description');
			$table->integer('parent');
			$table->integer('count');
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
		Schema::drop('term_taxonomy');
	}

}
