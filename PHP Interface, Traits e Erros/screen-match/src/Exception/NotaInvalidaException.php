<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> f6dfb45e1ddd5e2943da6bfa1bb5ffe7337cf758
<?php

namespace ScreenMatch\Exception;

class NotaInvalidaException extends \InvalidArgumentException
{
    #[Override]
    public function __construct(){
        parent::__construct('Nota precisa ser entre 0 e 10');
    }
}

<<<<<<< HEAD
=======
=======
<?php

namespace ScreenMatch\Exception;

class NotaInvalidaException extends \InvalidArgumentException
{
    #[Override]
    public function __construct(){
        parent::__construct('Nota precisa ser entre 0 e 10');
    }
}

>>>>>>> 4c73aa89cb67170655448abad4c1ae066a9026ca
>>>>>>> f6dfb45e1ddd5e2943da6bfa1bb5ffe7337cf758
