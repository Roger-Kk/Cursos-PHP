<?php 

declare(strict_types=1);

namespace Alura\MVC\Helper;

//A trait é uma "característica" onde determinadas classes podem ter essa característica aplicada a elas
trait FlashMessageTrait {
    
    public function addErrorMessage(string $errorMessage): void {
        $_SESSION['error_message'] = $errorMessage;
    }
}