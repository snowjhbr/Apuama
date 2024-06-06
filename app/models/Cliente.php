<?php
class Cliente {
    private $conn;
    private $table_name = "Cliente";

    public $id;
    public $nome;
    public $data_nascimento;
    public $cpf;
    public $rua;
    public $cep;
    public $cidade;
    public $bairro;
    public $carteira_de_motorista;

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
        $query = "INSERT INTO " . $this->table_name . " SET nome=:nome, data_nascimento=:data_nascimento, cpf=:cpf, rua=:rua, cep=:cep, cidade=:cidade, bairro=:bairro, carteira_de_motorista=:carteira_de_motorista";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":data_nascimento", $this->data_nascimento);
        $stmt->bindParam(":cpf", $this->cpf);
        $stmt->bindParam(":rua", $this->rua);
        $stmt->bindParam(":cep", $this->cep);
        $stmt->bindParam(":cidade", $this->cidade);
        $stmt->bindParam(":bairro", $this->bairro);
        $stmt->bindParam(":carteira_de_motorista", $this->carteira_de_motorista);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>
