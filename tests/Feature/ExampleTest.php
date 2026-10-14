<?php

namespace Tests\Feature;

use Tests\TestCase;

class ExampleTest extends TestCase
{
    public function test_root_redirects_to_mahasiswa_list(): void
    {
        $this->get('/')->assertRedirect('/mahasiswa');
    }

    public function test_ping_returns_pong(): void
    {
        $this->get('/ping')
            ->assertOk()
            ->assertJson(['message' => 'pong']);
    }
}