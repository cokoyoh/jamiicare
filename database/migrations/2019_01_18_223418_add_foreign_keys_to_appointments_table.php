<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAppointmentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('appointments', function(Blueprint $table)
		{
			$table->foreign('doctor_id', 'fk_appointments_doctors1')->references('id')->on('doctors')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('patient_id', 'fk_appointments_users1')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('appointments', function(Blueprint $table)
		{
			$table->dropForeign('fk_appointments_doctors1');
			$table->dropForeign('fk_appointments_users1');
		});
	}

}
