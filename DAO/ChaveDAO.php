<?php

namespace APP\DAO;

use APP\Model\ChaveModel;
use \PDO;

class ChaveDAO extends DAO
{

    public function __construct()
    {
        parent::__construct();
    }

    public function Save(ChaveModel $model) : ?ChaveModel
    {
        return ($model->id == null) ? $this->insert($model) : $this->update($model);
    }

    public function insert(ChaveModel $model) : ?ChaveModel
    {
        $sql = "INSERT INTO chave_pix(tipo, chave, id_conta) VALUES (?, ?, ?)";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->tipo);
        $stmt->bindValue(2, $model->chave);
        $stmt->bindValue(3, $model->id_conta);
        $stmt->execute();

        $model->id = $this->conexao->lastInsertId();

        return $model;
    }

    public function update(ChaveModel $model) : ?ChaveModel
    {
        $sql = "UPDATE chave_pix SET tipo = ?, chave = ?, id_conta = ? WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->tipo);
        $stmt->bindValue(2, $model->chave);
        $stmt->bindValue(3, $model->id_conta);
        $stmt->bindValue(4, $model->id);
        $stmt->execute();

        $model->id = $this->conexao->lastInsertId();

        return $model;    
    }

    public function select()
    {
        $sql = "SELECT cp.*,
                co.nome as nome_conta
        FROM chave_pix cp 
        JOIN conta c ON c.id = cp.id_conta
        JOIN correntista co ON co.id = c.id_correntista

        ";

        $stmt = $this->conexao->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function selectById(int $id_correntista)
    {
        $sql = "SELECT cp.*
                FROM chave_pix cp
                JOIN conta c ON (c.id_conta = cp.id_conta)
                WHERE c.id_correntista = ? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id_correntista);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS); 
    }

    public function delete(ChaveModel $model) : bool
    {
        $sql = "DELETE FROM chave_pix WHERE id=? AND id_conta=? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->id);
        $stmt->bindValue(1, $model->id_conta);
        
        return $stmt->execute(); 
    }
}