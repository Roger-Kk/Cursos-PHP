<?php

namespace ScreenMatch\Modelo;

//"Características", ou Traits ou Herança Horizontal
//Permite que outras classes usem dos métodos, porém sem ser um tipo, ou ainda
//sem permitir que seja haja outras classes estendidas dela.
trait ComAvaliacao
{
    private array $notas = [];

    public function avalia(float $nota): void
    {
        $this->notas[] = $nota;
    }

    public function media(): float
    {
        $somaNotas = array_sum($this->notas);
        $quantidadeNotas = count($this->notas);

        return $somaNotas / $quantidadeNotas;
    }


}

