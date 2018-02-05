<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProgramNameToProgramTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('program_times', function (Blueprint $table) {
            //
            $table->string('program_name')->nullable()->after('program_id');
            \DB::statement("ALTER TABLE `program_times` CHANGE `program_id` `program_id` INT(10) UNSIGNED NULL");
        });
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('program_times', function (Blueprint $table) {
            //
            $table->dropColumn(['program_name']);
        });
    }
}
