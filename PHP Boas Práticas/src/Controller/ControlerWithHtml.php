<?php

declare(strict_types=1);

namespace Alura\MVC\Controller;

//Uma classe abstrata não permite instanciar uma classe
//Se uma classe abstrata implementa outra classe, é a mesma coisa que exigir que a classe que extende-la precise implementar o método do Controler
abstract class ControlerWithHtml implements Controller{

    private const TEMPLATE_PATH = __DIR__ . '/../../views/';

    protected function renderTemplate(string $templateName, array $context = []): string{

        //Função extract realiza a extração dos valores de um array associativo em variáveis string
        extract($context);

        ob_start();
        require_once  self::TEMPLATE_PATH . $templateName . '.php';
        return ob_get_clean();
    }
}