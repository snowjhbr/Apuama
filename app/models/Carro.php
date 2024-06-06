<?php
class Carro {
    private $conn;
    private $table_name = "Automovel";

    public $placa;
    public $cor;
    public $chassis;
    public $modelo;
    public $direcao_assistida;
    public $ar_condicionado;
    public $manutencao;
    public $nro_de_porta;
    public $quilometragem;
    public $transmissao;
    public $marca;
    public $tipo_de_combustivel;
    public $renavam;
    public $tipo;
    public $status;
    public $valor;

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
        $query = "INSERT INTO " . $this->table_name . " SET
            placa=:placa, cor=:cor, chassis=:chassis, modelo=:modelo,
            direcao_assistida=:direcao_assistida, ar_condicionado=:ar_condicionado, manutencao=:manutencao,
            nro_de_porta=:nro_de_porta, quilometragem=:quilometragem, transmissao=:transmissao,
            marca=:marca, tipo_de_combustivel=:tipo_de_combustivel, renavam=:renavam,
            tipo=:tipo, status=:status, valor=:valor";
        
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":placa", $this->placa);
        $stmt->bindParam(":cor", $this->cor);
        $stmt->bindParam(":chassis", $this->chassis);
        $stmt->bindParam(":modelo", $this->modelo);
        $stmt->bindParam(":direcao_assistida", $this->direcao_assistida);
        $stmt->bindParam(":ar_condicionado", $this->ar_condicionado);
        $stmt->bindParam(":manutencao", $this->manutencao);
        $stmt->bindParam(":nro_de_porta", $this->nro_de_porta);
        $stmt->bindParam(":quilometragem", $this->quilometragem);
        $stmt->bindParam(":transmissao", $this->transmissao);
        $stmt->bindParam(":marca", $this->marca);
        $stmt->bindParam(":tipo_de_combustivel", $this->tipo_de_combustivel);
        $stmt->bindParam(":renavam", $this->renavam);
        $stmt->bindParam(":tipo", $this->tipo);
        $stmt->bindParam(":status", $this->status);
        $stmt->bindParam(":valor", $this->valor);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>
