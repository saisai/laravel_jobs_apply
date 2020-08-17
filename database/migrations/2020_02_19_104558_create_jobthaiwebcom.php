<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobthaiwebcom extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobthaiwebcom', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->string('title', 500);
			$table->string('link', 500);
			$table->string('time', 500);
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
        Schema::dropIfExists('jobthaiwebcom');
    }
}
