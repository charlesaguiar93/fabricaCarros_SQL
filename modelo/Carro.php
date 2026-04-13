<?php
declare(strict_types=1);
include 'conexao.php';

class Carro
{
    private string $modelo;
    private string $cor;

    public function __construct(string $modelo, string $cor)  {
  
        $this->modelo = $modelo;
        $this->cor = $cor;
    }

    public function getModelo(): string {
   
        return $this->modelo;
    }

   
    public function getCor(): string {
   
        return $this->cor;
    }

    
}