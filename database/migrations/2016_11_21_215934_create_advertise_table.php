<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertiseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertise', function (Blueprint $table) {
            $table->increments('id');
			$table->string('title');
			$table->string('link')->nullable();
			$table->text('google_code')->nullable();
			$table->boolean('position')->default(1)->comment = "from 1 to 10 positions";
			$table->boolean('type')->default(0)->comment = " 0=>for custom, 1=>for google";
			$table->boolean('status')->default(0);
            $table->timestamp('expired_at')->nullable();
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
        Schema::dropIfExists('advertise');
    }
}
