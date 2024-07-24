<?php

namespace ScreenMatch\Modelo;

class Serie extends Titulo
{
    public function __construct(
        string $nome,
        int $anoLancamento,
        /*
        Genero $genero,
        public readonly $temporadas,
        public readonly $episodiosPorTemporada,
        public readonly $minutosPorEpisodio
        */
        private $temporadas,
        private $episodiosPorTemporada,
        private $minutosPorEpisodio
    ) {
        //parent::__construct($nome, $anoLancamento, $genero);
        parent::__construct($nome, $anoLancamento);
    }
    
    #[\Override]
    public function duracaoEmMinutos(): int
    {
        return $this->temporadas * $this->episodiosPorTemporada * $this->minutosPorEpisodio;
    }
}