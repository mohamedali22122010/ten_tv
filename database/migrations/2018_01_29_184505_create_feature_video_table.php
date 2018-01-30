<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeatureVideoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feature_videos', function (Blueprint $table) {
            $table->increments('id');
			$table->text('title')->nullable();
			$table->integer('program_id')->unsigned();
            $table->string('link');
            $table->boolean('is_home')->default(0);

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
        Schema::dropIfExists('feature_videos');
    }
}
