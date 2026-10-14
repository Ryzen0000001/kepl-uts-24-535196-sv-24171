<?php

namespace Tests\Feature;

use App\Models\Mahasiswa;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MahasiswaApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_api_returns_json_list(): void
    {
        Mahasiswa::factory()->create(['nama' => 'Siti Aminah']);

        $this->getJson('/api/mahasiswa')
            ->assertOk()
            ->assertJsonCount(1)
            ->assertJsonFragment(['nama' => 'Siti Aminah']);
    }

    public function test_api_allows_cors_from_vue(): void
    {
        $this->getJson('/api/mahasiswa', ['Origin' => 'http://localhost:5173'])
            ->assertHeader('Access-Control-Allow-Origin', '*');
    }
}
