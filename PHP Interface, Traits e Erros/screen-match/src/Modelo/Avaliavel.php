<?php

namespace ScreenMatch\Modelo;

// A interface possui propriedades e métodos abstratos e trata-se de um contrato e nao uma herança entre classes
interface Avaliavel{
    public function avalia(float $nota): void;
    public function media():float;
}