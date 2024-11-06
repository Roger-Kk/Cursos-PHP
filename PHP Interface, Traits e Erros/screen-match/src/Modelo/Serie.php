<<<<<<< HEAD
=======
<<<<<<< HEAD
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
=======
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

    public function duracaoEmMinutos(): int
    {
        return $this->temporadas * $this->episodiosPorTemporada * $this->minutosPorEpisodio;
    }
}
>>>>>>> 4c73aa89cb67170655448abad4c1ae066a9026ca
>>>>>>> f6dfb45e1ddd5e2943da6bfa1bb5ffe7337cf758
