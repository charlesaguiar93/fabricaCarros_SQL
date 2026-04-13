<?php


declare(strict_types=1);

require_once __DIR__ . '/Carro.php';
include 'conexao.php';
class Fabrica
{
    /** var Carro[]*/
    private array $carros = [];

    /** @return o array Carro[] */
    public function getCarros(): array
    {
        return $this->carros;
    }

    /**
     * Fabrica N carros usando for e retorna os carros criados.
     * @return Carro[] carros criados nesta fabricação
     */
    public function fabricarCarro(string $modelo, string $cor, int $quantidade): array{
    
        $criados = [];

        for ($i = 1; $i <= $quantidade; $i++) {
            $carro = new Carro($modelo, $cor);
            $this->carros[] = $carro;
            $criados[] = $carro;
        }

        return $criados;
    }

    /**
     * Vende (remove) 1 carro pelo modelo e cor.
     * Remove o primeiro que encontrar.
     */
    /* unset -  usada para remover variáveis específicas, elementos de arrays ou propriedades de objetos.
     */
    public function venderCarro(string $modelo, string $cor): bool  {
  
        foreach ($this->carros as $i => $carro) {
            if ($carro->getModelo() === $modelo && $carro->getCor() === $cor) {
                unset($this->carros[$i]);
                $this->carros = array_values($this->carros); // reorganiza índices
                return true;
            }
        }
        return false;
    }

    /* Void -  ela executa uma ação, mas não devolve nada. */
    public function listarCarros(): void
    {
        echo "<h2>📋 Carros na fábrica</h2>";

        if (count($this->carros) === 0) {
            echo "<p>Nenhum carro disponível.</p>";
            return;
        }

        echo "<ul>";
        foreach ($this->carros as $i => $carro) {
            
        $n = $i + 1;
            echo "<li>🚗 #{$n} — Modelo: <b>{$carro->getModelo()}</b> | Cor: <b>{$carro->getCor()}</b></li>";
        }
        echo "</ul>";
    }
}