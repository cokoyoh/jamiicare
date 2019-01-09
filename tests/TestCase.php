<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Jamiicare\Models\User;
use Illuminate\Contracts\Debug\ExceptionHandler;
use App\Exceptions\Handler;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function setUp()
    {
        parent::setUp();
        $this->disableExceptionHandling();
    }

    public function signUp($user = null)
    {
        $user = $user ?: create(User::class);

        $this->actingAs($user);

        return $this;
    }


    protected function disableExceptionHandling()
    {
        $this->oldExceptionHandler = $this->app->make(ExceptionHandler::class);

        $this->app->instance(ExceptionHandler::class, new class extends Handler {
            public function __construct() {}
            public function report(\Exception $e) {}
            public function render($request, \Exception $e) {
                throw $e;
            }
        });
    }
}
