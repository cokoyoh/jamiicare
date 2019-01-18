<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Jamiicare\Models\Doctor;
use Jamiicare\Models\User;
use Tests\TestCase;

class DoctorsUnitTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_is_an_instance_of_user()
    {
        $doctor = create(Doctor::class);

        $this->assertInstanceOf(User::class, $doctor->user);
    }
}
