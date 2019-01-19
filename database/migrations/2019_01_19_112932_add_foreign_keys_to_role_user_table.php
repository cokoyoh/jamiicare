<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToRoleUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('role_user', function(Blueprint $table)
		{
			$table->foreign('role_id', 'fk_role_user_roles')->references('id')->on('roles')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('user_id', 'fk_role_user_users1')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('role_user', function(Blueprint $table)
		{
			$table->dropForeign('fk_role_user_roles');
			$table->dropForeign('fk_role_user_users1');
		});
	}

}
