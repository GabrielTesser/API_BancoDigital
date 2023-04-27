<?php

namespace App\Controller;

use Api\Model\CorrentistaModel;
use Exception;

class CorrentistaController extends Controller
{
    public static function salvar() : void
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
    
    public static function listar() : void
    {
        try
        {
            $model = new CorrentistaModel();
            
            $model->getAllRows();

            parent::getResponseAsJSON($model->rows);
              
        } catch (Exception $e) {

            parent::LogError($e);
            parent::getExceptionAsJSON($e);
        }
    }

    public static function buscar() : void
    {
        try
        {
            $model = new CorrentistaModel();
            
            $q = json_decode(file_get_contents('php://input'));
                        
            $model->getAllRows($q);

            parent::getResponseAsJSON($model->rows);
              
        } catch (Exception $e) {

            parent::LogError($e);
            parent::getExceptionAsJSON($e);
        }    }

    public static function deletar() :void
    {
        try 
        {
            $id = json_decode(file_get_contents('php://input'));
            
            (new CorrentistaModel())->delete( (int) $id);

        } catch (Exception $e) {

            parent::LogError($e);
            parent::getExceptionAsJSON($e);
        }
    }

}