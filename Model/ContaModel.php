<?php
namespace APP\Model;

use APP\DAO\ContaDAO;

class ContaModel extends Model
{
	public $id, $id_cliente, $saldo, $limite, $tipo, $data_abertura;

	public function save() 
	{
		$dao = new ContaDAO();

		if(empty($this->id))
        {
            $dao->insert($this);

        } else 
		{

        }        

	}

	public function getAllRows(int $id_cidadao)
	{
		$dao = new ContaDAO();
		
		$this->rows = $dao->select($id_cidadao);
	}
}