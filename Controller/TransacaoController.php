<?php

namespace APP\Controller;

use APP\Model\TransacaoModel;
use Exception;

class TransacaoController extends Controller{

    public static function receberPix()
    {
        $data = json_decode(file_get_contents('php://input'));

    }

    public static function enviarPix()
    {
        $data = json_decode(file_get_contents('php://input'));

    }

} 