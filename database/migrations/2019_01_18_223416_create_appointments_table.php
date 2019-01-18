<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAppointmentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('appointments', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('patient_id')->nullable()->index('fk_appointments_users1_idx');
			$table->integer('doctor_id')->nullable()->index('fk_appointments_doctors1_idx');
			$table->date('date')->nullable();
			$table->string('title')->nullable();
			$table->text('description')->nullable();
			$table->dateTime('approved_at')->nullable();
			$table->timestamps();
			$table->softDeletes();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('appointments');
	}

}
