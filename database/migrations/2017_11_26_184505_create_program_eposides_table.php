<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgramEposidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('program_eposides', function (Blueprint $table) {
            $table->increments('id');
			$table->json('title');
			$table->integer('program_id')->unsigned();
            $table->string('link');

			$table->foreign('program_id')->references('id')->on('programs')->onDelete('cascade');			
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
        Schema::dropIfExists('program_eposides');
    }
}
