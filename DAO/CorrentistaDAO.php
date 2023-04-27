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

    public function select() : array
    {
        $sql = "SELECT * FROM correntista ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(DAO::FETCH_CLASS);
    }

    public function search(string $query): array
    {
        $str_query = ['filtro' => '%' . $query . '%'];

        $sql = "SELECT * FROM correntista WHERE nome LIKE :filtro ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute($str_query);

        return $stmt->fetchAll(DAO::FETCH_CLASS, "Api\Model\CorrentistaModel");
    }

    public function insert(CorrentistaModel $m) : CorrentistaModel
    {

        $sql = "INSERT INTO correntista (nome, cpf, senha, data_nasc) VALUES (?, ?, ?, ?) ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $m->nome);
        $stmt->bindValue(2, $m->cpf);
        $stmt->bindValue(3, $m->senha);
        $stmt->bindValue(4, $m->data_nasc);

        $m->id = $this->conexao->lastInsertId();

        return $m;
    }

    public function update(CorrentistaModel $m) : bool
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