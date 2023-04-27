<?php

use Api\DAO\CorrentistaDAO;
use App\Controller\{CorrentistaController, ContaController};

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($url)
{

    // rotas correntista

    case '/correntista/save':
        CorrentistaController::salvar();
    break;

    case '/correntista':
        CorrentistaController::listar();
    break;

    case '/correntista/buscar':
        CorrentistaController::buscar();
    break;

    case '/correntista/deletar':
        CorrentistaController::deletar();
    break;

    case '/conta/extrato':
        ContaController::getExtrato();
    break;

    //

    case '/conta/pix/receber':
        ContaController::PixReceber();
    break;

    case '/conta/pix/receber':
        ContaController::PixEviar();
    break;
    
    default:
        http_response_code(403);
    break;
}