<<<<<<< HEAD
<?php

namespace ScreenMatch\Exception;

class NotaInvalidaException extends \InvalidArgumentException
{
    #[Override]
    public function __construct(){
        parent::__construct('Nota precisa ser entre 0 e 10');
    }
}

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
