<?php 

declare(strict_types=1);

namespace Alura\MVC\Helper;

//Trait Criada para substituir a classe abstrata ControlerWithHtml
trait HtmlRenderTrait{

    //Traits não podem ter constantes
    //private const TEMPLATE_PATH = __DIR__ . '/../../views/';

    private function renderTemplate(string $templateName, array $context = []): string{

        $templatePath = __DIR__ . '/../../views/';

        //Função extract realiza a extração dos valores de um array associativo em variáveis string
        extract($context);

        ob_start();
        //require_once  self::TEMPLATE_PATH . $templateName . '.php';
        require_once $templatePath . $templateName . '.php';
        return ob_get_clean();
    }
}