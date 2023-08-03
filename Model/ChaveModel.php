<?php
namespace APP\Model;

use APP\DAO\ChaveDAO;

class ChaveModel extends Model {
	
	public $id, $id_conta, $tipo, $chave;

	public function save() : ?ChaveModel
	{
		return (new ChaveDAO())->save($this);
	}

	public function getAllRows(int $id_correntista) : array
	{
		return (new ChaveDAO())->select($id_correntista);  
	}

	public function remove() : bool
	{
		return (new ChaveDAO())->delete($this);  
	}
}