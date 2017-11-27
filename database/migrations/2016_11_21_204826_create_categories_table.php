<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
			$table->json('title');
			$table->string('slug');
			$table->json('description');
			$table->json('meta_tag_title');
			$table->json('meta_tag_description');
			$table->json('meta_tag_keywords');
			$table->boolean('status')->default(0);
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
	    DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('categories');
	    DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
