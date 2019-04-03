<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBedManagementTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bed_management', function(Blueprint $table)
		{
			$table->string('bed_management_id')->primary('bed_management_pkey');
			$table->string('admit_id')->nullable()->index('bed_management_admit_id');
			$table->string('base_room_id')->nullable()->index('idx_bed_mgnt_room_id');
			$table->string('base_service_point_id')->nullable()->index('bed_management_base_sp_id');
			$table->string('room_number')->nullable();
			$table->string('bed_number')->nullable();
			$table->string('base_room_type_id')->nullable();
			$table->string('move_date')->nullable();
			$table->string('move_time')->nullable();
			$table->string('move_out_date')->nullable();
			$table->string('move_out_time')->nullable();
			$table->string('current_bed')->nullable()->index('bed_management_current_bed');
			$table->string('ward_code')->nullable();
			$table->string('base_department_id')->nullable();
			$table->string('note')->nullable();
			$table->string('modify_eid')->nullable();
			$table->string('modify_date')->nullable();
			$table->string('modify_time')->nullable();
			$table->string('order_continue_id')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('bed_management');
	}

}
