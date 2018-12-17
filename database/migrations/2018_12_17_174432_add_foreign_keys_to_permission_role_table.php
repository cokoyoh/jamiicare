<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPermissionRoleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('permission_role', function(Blueprint $table)
		{
			$table->foreign('permission_id', 'fk_permission_role_permissions1')->references('id')->on('permissions')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('role_id', 'fk_permission_role_roles1')->references('id')->on('roles')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('permission_role', function(Blueprint $table)
		{
			$table->dropForeign('fk_permission_role_permissions1');
			$table->dropForeign('fk_permission_role_roles1');
		});
	}

}
