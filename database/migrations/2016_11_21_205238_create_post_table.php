<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
			$table->json('title');
			$table->string('slug');
			$table->json('description');
			$table->json('content');
			$table->json('meta_tag_title');
			$table->json('meta_tag_description');
			$table->json('meta_tag_keywords');
			$table->integer('user_id')->unsigned();
			$table->integer('category_id')->unsigned();
            $table->boolean('status')->default(1);
            $table->timestamps();
			
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
