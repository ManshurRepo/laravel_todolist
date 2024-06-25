<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TodolistControllerTest extends TestCase
{
   public function testTodolist()
   {
        $this->withSession([
            "user" => "khannedy",
            "todolist" => [
                [
                    "id" => "1",
                    "todo" => "Eko"
                ],
                [
                    "id" => "2",
                    "todo" => "Khannedy"
                ]
            ]
        ])->get('/todolist')
        ->assertSeeText("1")
        ->assertSeeText("Eko")
        ->assertSeeText("2")
        ->assertSeeText("Khannedy");

   }

   public function testAddTodolistFailed()
    {
        $this->withSession([
            "user" => "khannedy"
        ])->post("/todolist", [])
        ->assertSeeText("Todo is required");
    }

    public function testAddTodoSuccess()
    {
        $this->withSession([
            "user" => "khannedy"
        ])->post("/todolist", [
            "todo" => "Eko"
        ])->assertRedirect("/todolist");
    }

    public function testRemoveTodolist()
    {
        $this->withSession([
            "user" => "khannedy",
            "todolist" => [
                [
                    "id" => "1",
                    "todo" => "Eko"
                ],
                [
                    "id" => "2",
                    "todo" => "Khannedy"
                ]
            ]
        ])->post("/todolist/1/delete")
        ->assertRedirect("/todolist");
    }
}
