<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgramTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('program_times', function (Blueprint $table) {
            $table->increments('id');			
			$table->boolean('day');
			$table->integer('program_id')->unsigned();
			$table->boolean('repeate')->default(0)->comment = "1 for repeat and 0 for first show";
            $table->string('show_at');
			
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
        Schema::dropIfExists('program_times');
    }
}
