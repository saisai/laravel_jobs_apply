<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTbUpload extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('tb_upload', function(Blueprint $table)
        {
            $table->increments('id');
            //$table->string('title');
            $table->string('apply_for_id'); //from tb_apply_for
            $table->string('filename');
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
        Schema::drop('tb_upload');
	}

}
