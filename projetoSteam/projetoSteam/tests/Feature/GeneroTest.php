<?php

namespace Tests\Feature;

use App\Models\Genero;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GeneroTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test submitting a valid genre name.
     *
     * @return void
     */
    public function testCreateGeneroWithValidData()
    {
        $genreName = 'Action';

        $response = $this->post(route('generos.store'), [
            'nome' => $genreName,
        ]);

        $response->assertRedirect(route('generos.index'));
        $response->assertSessionHas('success', 'Genre created successfully!');

        $this->assertDatabaseHas('generos', [
            'nome' => $genreName,
        ]);
    }

    /**
     * Test submitting an empty genre name.
     *
     * @return void
     */
    public function testCreateGeneroWithEmptyName()
    {
        $response = $this->post(route('generos.store'), [
            'nome' => '',
        ]);

        $response->assertSessionHasErrors('nome');
    }
}
