<?php

use App\Controller\
{
    ChaveController,
    ContaController,
    CorrentistaController,
    TransacaoController
};

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($url)
{
    case '/exportar':
        $return_var = NULL;
        $output = NULL;
        $command = 'C:/"Program Files"/MySQL/"MySQL Server 8.0"/bin/mysqldump -uroot -petecjau -P3307 -hlocalhost db_bancodigital > C:/Dev/file.sql';
        exec($command, $output, $exit_code);

        var_dump($exit_code);

        echo "deu certo.";
    break;

    // rotas correntista

    case '/correntista/salvar':
        CorrentistaController::salvar();
    break;

    case '/correntista/entrar':
        CorrentistaController::login();
    break;

    case '/conta/abrir':
        ContaController::abrir();
    break;
    
    case '/conta/fechar':
        ContaController::fechar();
    break;
    
    case '/conta/extrato':
        ContaController::extrato();
    break;

    case '/transacao/pix/receber':
        TransacaoController::receberPix();
    break;

    case '/transacao/pix/enviar':
        TransacaoController::enviarPix();
    break;

    
    default:
        http_response_code(403);
    break;
}