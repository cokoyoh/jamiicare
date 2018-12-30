<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['id' => 1, 'name' => 'Admin', 'description' => 'System administrator'],
            ['id' => 2, 'name' => 'User', 'description' => 'Basic System User']
        ];

        collect($roles)
            ->each(function ($role){
                factory(\Jamiicare\Models\Role::class)->create($role);
            });
    }
}
