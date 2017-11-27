<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->nullable()->unique();
            $table->string('password');
			$table->string('phone')->nullable();
			$table->integer('role_id')->default(6)->comment = "1=> admin , 2=>disk , 3=>doctor , 4=>hospital , 5=>company , 6=>regular";
			$table->text('about')->nullable();
			$table->integer('ordering')->nullable();
			$table->text('social_media')->nullable();
			$table->string('slug');
            $table->boolean('status')->default(0);
            $table->boolean('confirmed')->default(0);
			$table->string('confirmation_code')->nullable();
			$table->rememberToken();
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
        Schema::dropIfExists('users');
	    DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
