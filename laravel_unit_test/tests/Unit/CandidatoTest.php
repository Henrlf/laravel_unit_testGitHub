<?php

namespace Tests\Unit;

use App\Models\Candidato;
use PHPUnit\Framework\TestCase;

class CandidatoTest extends TestCase
{
    /**
     * Testa se as colunas dos candidatos estão corretas
     *
     * @return void
     */
    public function test_example1()
    {
        $user = new Candidato();

        $expected = [
            'nome',
            'email',
            'telefone',
            'aprovado'
        ];

        $arrayCompared = array_diff($expected, $user->getFillable());

        $this->assertEquals(0, count($arrayCompared));
    }
}
