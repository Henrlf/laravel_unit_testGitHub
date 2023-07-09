<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CustomerTest extends TestCase
{
    /**
     * Testa para verificar se volta para o login caso não esteja logado
     *
     * @return void
     */
    public function test_example1()
    {
        $response = $this->get('/admin/candidatos');
        $response->assertRedirect('/admin/login');
    }
}
