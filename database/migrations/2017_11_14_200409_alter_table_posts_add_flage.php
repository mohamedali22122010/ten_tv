<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTablePostsAddFlage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            //
            $table->boolean('type')->default(1)->comment = "1 => for text , 2 => for video, 3 => for audio";            
            $table->boolean('home_page_right')->default(0);
            $table->boolean('home_page_left')->default(0);
            $table->boolean('home_page_soon')->default(0);
            $table->string('link')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            //
            $table->dropColumn(['type','home_page_right','home_page_left','home_page_soon','link']);                        
        });
    }
}
