<?php

namespace ScreenMatch\Calculos;

use ScreenMatch\Modelo\Avaliavel;
//É possível dar um apelido para o diretório do arquivo:
//use ScreenMatch\Modelo\Avaliavel as AvaliavelTrait;

class ConversorNotaEstrela
{
    public function converte(Avaliavel $avaliavel): float{
        $nota = $avaliavel->media();

        //Realiza a conversão
        return  round($nota) / 2;
    }
}