<?php

namespace Tests\Feature;

use App\Models\Mahasiswa;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MahasiswaTest extends TestCase
{
    use RefreshDatabase;

    private array $data = ['nim' => '24/535196/SV/24171', 'nama' => 'Budi', 'prodi' => 'TRPL'];

    public function test_index_shows_data(): void
    {
        Mahasiswa::factory()->create(['nama' => 'Siti Aminah']);

        $this->get('/mahasiswa')->assertOk()->assertSee('Siti Aminah');
    }

    public function test_can_create(): void
    {
        $this->post('/mahasiswa', $this->data)->assertRedirect('/mahasiswa');

        $this->assertDatabaseHas('mahasiswa', $this->data);
    }

    public function test_create_requires_valid_input(): void
    {
        $this->post('/mahasiswa', [])->assertSessionHasErrors(['nim', 'nama', 'prodi']);
    }

    public function test_nim_must_be_unique(): void
    {
        Mahasiswa::create($this->data);

        $this->post('/mahasiswa', $this->data)->assertSessionHasErrors('nim');
    }

    public function test_can_update(): void
    {
        $m = Mahasiswa::create($this->data);

        $this->put("/mahasiswa/{$m->id}", [...$this->data, 'nama' => 'Budi Baru'])
            ->assertRedirect('/mahasiswa');

        $this->assertDatabaseHas('mahasiswa', ['id' => $m->id, 'nama' => 'Budi Baru']);
    }

    public function test_can_delete(): void
    {
        $m = Mahasiswa::create($this->data);

        $this->delete("/mahasiswa/{$m->id}")->assertRedirect('/mahasiswa');

        $this->assertDatabaseMissing('mahasiswa', ['id' => $m->id]);
    }
}
