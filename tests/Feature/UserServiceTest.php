<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Services\UserService;

class UserServiceTest extends TestCase
{

    private UserService $userService;

    protected function setUp():void
    {
        parent::setUp();
        $this->userService = $this->app->make(UserService::class);
    }

    public function testSample()
    {
        self::assertTrue(true);
    }

    public function testLoginSuccess()
    {
        self::assertTrue($this->userService->login("khannedy", "rahasia"));
    }

    public function testLoginUserNotFound()
    {
        self::assertFalse($this->userService->login("asep", "srepet"));
    }

    public function testLoginWrongPassword()
    {
        self::assertFalse($this->userService->login("khannedy", "srepet"));
    }

}
