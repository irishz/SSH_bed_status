<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUpdateBeds extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('beds', function (Blueprint $table) {
            $table->string('room_type')->nullable();
            $table->time('move_time')->after('move_date')->nullable();
            $table->string('admit_duration')->nullable();
            $table->string('employee_admit')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('beds', function (Blueprint $table) {
            
        });
    }
}
