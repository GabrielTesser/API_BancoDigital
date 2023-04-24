<?php

namespace Api\DAO;

use Api\Model\CorrentistaModel;
use APP\DAO\DAO;

class CorrentistaDAO extends DAO
{
    public function __construct()
    {
        parent::__construct();
    }

    public function Select()
    {
        $sql = "SELECT * FROM correntista ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(DAO::FETCH_CLASS);
    }

    public function insert(CorrentistaModel $m) : bool
    {
        $sql = "INSERT INTO correntista (nome, cpf, senha, data_nasc) VALUES (?, ?, ?, ?) ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $m->nome);
        $stmt->bindValue(2, $m->cpf);
        $stmt->bindValue(3, $m->senha);
        $stmt->bindValue(4, $m->data_nasc);

        return $stmt->execute();
    }

    public function Update(CorrentistaModel $m)
    {
        $sql = "UPDATE correntista SET nome=?, cpf=?, senha=?, data_nasc=? WHERE id=? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $m->nome);
        $stmt->bindValue(2, $m->cpf);
        $stmt->bindValue(2, $m->senha);
        $stmt->bindValue(2, $m->data_nasc);
        $stmt->bindValue(3, $m->id);

        return $stmt->execute();
    }

    public function delete(int $id) : bool
    {
        $sql = "DELETE FROM correntista WHERE id = ? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        return $stmt->execute();
    }
}