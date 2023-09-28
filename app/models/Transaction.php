<?php

namespace App\Models;

use App\Models\Database;

class Transaction
{
    private $conn;

    public function __construct()
    {
        $this->conn = Database::getConnection();
    }

    public function getTransactions()
    {
        return $this->conn->query("SELECT * FROM transacoes")->fetchAll();
    }

    public function sumEntry()
    {
        return $this->conn->query("SELECT COALESCE(sum(valor), '0') AS Entrada FROM transacoes WHERE tipo = 'Entrada'")->fetch()['Entrada'];
    }

    public function sumExit()
    {
        return $this->conn->query("SELECT COALESCE(sum(valor), '0') AS Saida FROM transacoes WHERE tipo = 'Saída'")->fetch()['Saida'];
    }

    public function insertTransaction($description, $amount, $type)
    {
        $stmt = $this->conn->prepare("INSERT INTO transacoes (descricao, valor, tipo) VALUES (?, ?, ?)");

        if (!$stmt->execute([$description, $amount, $type])) {
            return false;
        }

        return true;
    }

    public function deleteTransaction($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM transacoes WHERE id = :id");
        $stmt->bindValue(':id', $id);

        if (!$stmt->execute() || $stmt->rowCount() == 0) {
            return false;
        }

        return true;
    }
}
