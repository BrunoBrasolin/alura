<?php

namespace Tests\Unit;

use App\Serie;
use App\Services\CriadorDeSeries;
use App\Services\RemovedorDeSeries;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RemovedorDeSerieTest extends TestCase
{
    /**@var Serie */
    private $serie;

    use RefreshDatabase;

    protected function setUp() :void
    {
        parent::setUp();
        $criadorDeSerie = new CriadorDeSeries();
        $this->serie = $criadorDeSerie->criarSerie('Nome Teste', 1, 1);
    }

    public function testRemoverUmaSerie()
    {
        $this->assertDatabaseHas('series', ['id' => $this->serie->id]);
        $removedorDeSerie = new RemovedorDeSeries();
        $nomeSerie = $removedorDeSerie->remover($this->serie->id);
        $this->assertIsString($nomeSerie);
        $this->assertEquals('Nome Teste', $this->serie->nome);
        $this->assertDatabaseMissing('series', ['id' => $this->serie->id]);
    }
}
