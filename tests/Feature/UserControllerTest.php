<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    public function testLogin() {
        $this->get('/login')
        -> assertSeeText("Login");
    }

    public function testLoginPageForMember()
    {
        $this->withSession([
            "user" => "khannedy"
        ]) -> get('/login')
        ->assertRedirect("/");
    }

    public function testLoginSuccess() {
        $this->post('/login', [
            "user" => "khannedy",
            "password" => "rahasia"
        ])-> assertRedirect("/")
        ->assertSessionHas("user", "khannedy");
    }

    public function testLoginFailed() {
        $this->post('/login', [
            "user" => "wrong",
            "password" => "wromg"
        ])
        ->assertSeeText ("User or Password is Wrong");

        }

    public function testLogout() {
        $this->withSession([
            "user" => "khannedy"
        ])->post('/logout')
        ->assertRedirect("/")
        ->assertSessionMissing("user");
    }

    public function testGuestLogout()
    {
        $this->post("/logout")
            ->assertRedirect("/");
    }

}
