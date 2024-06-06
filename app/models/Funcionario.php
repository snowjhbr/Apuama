<?php
class Funcionario {
    private $conn;
    private $table_name = "Funcionario";

    public $id;
    public $funcao;
    public $nome;
    public $cpf;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function readAll() {
        $query = "SELECT f.*, u.nome, u.cpf FROM " . $this->table_name . " f JOIN Usuario u ON f.COD_FUNCIONARIO = u.COD_USUARIO";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function readById($id) {
        $query = "SELECT f.*, u.nome, u.cpf FROM " . $this->table_name . " f JOIN Usuario u ON f.COD_FUNCIONARIO = u.COD_USUARIO WHERE f.COD_FUNCIONARIO = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create() {
        $query = "INSERT INTO Usuario (nome, cpf) VALUES (:nome, :cpf)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":cpf", $this->cpf);

        if ($stmt->execute()) {
            $this->id = $this->conn->lastInsertId();
            $query = "INSERT INTO " . $this->table_name . " (COD_FUNCIONARIO, Função) VALUES (:id, :funcao)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":id", $this->id);
            $stmt->bindParam(":funcao", $this->funcao);

            if ($stmt->execute()) {
                return true;
            }
        }
        return false;
    }

    public function update() {
        $query = "UPDATE Usuario u JOIN Funcionario f ON u.COD_USUARIO = f.COD_FUNCIONARIO SET u.nome = :nome, u.cpf = :cpf, f.Função = :funcao WHERE f.COD_FUNCIONARIO = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":cpf", $this->cpf);
        $stmt->bindParam(":funcao", $this->funcao);
        $stmt->bindParam(":id", $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>
