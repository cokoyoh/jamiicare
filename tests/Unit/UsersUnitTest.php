<?php

namespace Tests\Unit;

use Jamiicare\Models\User;
use Jamiicare\Users\UsersRepository;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UsersUnitTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function it_creates_a_new_user()
    {
        $input = make(User::class)->toArray();

        $this->assertCount(0, User::all());

        (new UsersRepository())->save($input);

        $this->assertCount(1, User::all());
    }
}
