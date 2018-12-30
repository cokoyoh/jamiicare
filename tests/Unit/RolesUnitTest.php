<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Jamiicare\Models\Role;
use Jamiicare\Models\User;
use Jamiicare\Roles\RolesRepository;
use Jamiicare\Users\UsersRepository;
use Tests\TestCase;

class RolesUnitTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function it_assigns_a_role_to_a_user()
    {
        $user = create(User::class);

        $role = create(Role::class);

        $this->assertEquals(0, $user->roles()->count());

        (new UsersRepository())->attachRole($user, $role);

        $this->assertEquals(1, $user->roles()->count());
    }

    /** @test */
    function it_creates_a_new_role()
    {
        $input = [
            'name' => 'User',
            'description' => 'Basic user in the system'
        ];

        $this->assertCount(0, Role::all());

        (new RolesRepository())->save($input);

        $this->assertCount(1, Role::all());
    }
}
