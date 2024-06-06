<?php
class Categoria {
    private $conn;
    private $table_name = "Categoria";

    public $id;
    public $nome;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function readAll() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " SET nome=:nome";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nome", $this->nome);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>
