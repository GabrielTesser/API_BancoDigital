<?php

namespace App\Controller;

use Api\Model\CorrentistaModel;
use Exception;

class CorrentistaController extends Controller
{
    public static function Save() : void
    {
        try
        {
            $json_obj = json_decode(file_get_contents('php://input'));

            $model = new CorrentistaModel();
            $model->id = $json_obj->Id;
            $model->nome = $json_obj->Nome;
            $model->cpf = $json_obj->CPF;
            $model->senha = $json_obj->Senha;
            $model->data_nasc = $json_obj->Data_Nasc;

            $model->save();
              
        } catch (Exception $e) {

            parent::getExceptionAsJSON($e);
        }
    }
    
    public static function listar()
    {

    }

    public static function deletar()
    {
        
    }

   /* public static function Login()
    {
        
    }
    */
}