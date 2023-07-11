<?php

namespace Tests\Feature;

use Tests\TestCase;

class basicRoutes extends TestCase
{
    /**
     * Testa para verificar se volta para o status code correto
     *
     * @return void
     */
    public function testRotaRetornaStatusCodeCorreto()
    {
        $response = $this->get('/admin/candidatos');

        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function testRotaRetornaViewCorreta()
    {
        $response = $this->get('/admin/candidatos/create');

        $response->assertViewIs('admin.candidato.create');
    }

    /**
     * @return void
     */
    public function testRotaRetornaJsonCorreto()
    {
        $response = $this->get('/admin/candidatos');

        $response->assertJson([
            'nome' => 'Henrique Franceschini',
        ]);
    }
}
