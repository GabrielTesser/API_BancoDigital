<?php

namespace APP\Controller;

use APP\Model\ChaveModel;
use Exception;

class ChaveController extends Controller
{

    public static function save() : void
    {
        try
        {
            $data = json_decode(file_get_contents('php://input'));

            $model = new ChaveModel();

            foreach (get_object_vars($data) as $key => $value) 
            {
                $prop_letra_minuscula = strtolower($key);

                $model->$prop_letra_minuscula = $value;
            }
            
            parent::getResponseAsJSON($model->save()); 
        }
        catch(Exception $e)
        {
            parent::LogError($e);
            parent::getExceptionAsJSON($e);
        }
    }

    public static function Listar() : void
    {
        try
        {
            $data = json_decode(file_get_contents('php://input'));

            $model = new ChaveModel();

           
            parent::getResponseAsJSON($model->getAllRows($data->id_correntista)); 

        } catch(Exception $e) {
            
            parent::LogError($e);
            parent::getExceptionAsJSON($e);
        }
    }

    public static function Remover() : void
    {
        try
        {
            $data = json_decode(file_get_contents('php://input'));

            $model = new ChaveModel();

           
            foreach (get_object_vars($data) as $key => $value) 
            {
                $prop_letra_minuscula = strtolower($key);

                $model->$prop_letra_minuscula = $value;
            }
            
            parent::getResponseAsJSON($model->save()); 

        } catch(Exception $e) {
            
            parent::LogError($e);
            parent::getExceptionAsJSON($e);
        }
    }
} 