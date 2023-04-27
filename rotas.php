<?php

use App\Controller\{CorrentistaController, ContaController};

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($url)
{
    case '/correntista/save':
        CorrentistaController::salvar();
    break;

    case '/conta/extrato':
        ContaController::getExtrato();
    break;

    case '/conta/pix/receber':
        ContaController::PixReceber();
    break;

    case '/conta/pix/receber':
        ContaController::PixEviar();
    break;

    /*case '/correntista/entrar':
        CorrentistaController::Login();
    break;*/
    
    default:
        http_response_code(403);
    break;
}