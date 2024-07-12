<?php

class ConversorNotaEstrela{
    public function converte(Avaliavel $avaliavel): float{
        $nota = $avaliavel->media();

        //Realiza a conversão
        return  round($nota) / 2;
    }
}