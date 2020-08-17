<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTbDetail extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
        Schema::create('tb_detail', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('email', 255);
            //$table->string('link');
            $table->longText('qualification');
            $table->longText('responsibility');
            $table->longText('companyInfo');
            $table->longText('salary');
            $table->integer('tb_apply_id');
            //$table->integer('cv_file_name');
            $table->integer('apply_for_id');
			//$table->integer('users_id');
            $table->timestamps();
			//$table->primary(['link', 'users_id']);

            //$table->unique('link');
            //$table->unique('link');
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
        Schema::drop('tb_detail');
	}

}
