<<<<<<< HEAD
<?php

declare(strict_types=1);

namespace Alura\MVC\Controller;

class LogoutController implements Controller{

    public function processaRequisicao(): void{

        //Formas de deslogar a sessão: 
        //1 - $_SESSION['logado'] = false;
        //2 - unset($_SESSION['logado']);
            session_destroy();
            header('Location: /login');
    }
=======
<?php

declare(strict_types=1);

namespace Alura\MVC\Controller;

class LogoutController implements Controller{

    public function processaRequisicao(): void{

        //Formas de deslogar a sessão: 
        //1 - $_SESSION['logado'] = false;
        //2 - unset($_SESSION['logado']);
            session_destroy();
            header('Location: /login');
    }
>>>>>>> 0641de1614d0790b43b701fbad6295a7628803c3
}