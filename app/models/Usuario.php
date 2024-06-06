<?php
class Usuario {
    private $conn;
    private $table_name = "Usuario";

    public $id;
    public $nome;
    public $cpf;
    public $senha;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function login($cpf, $senha) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE cpf = :cpf";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":cpf", $cpf);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user && password_verify($senha, $user['senha'])) {
            return $user;
        }
        return false;
    }
}
?>
