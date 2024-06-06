<?php
class AluguelModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function isCarroAlugado($placaAutomovel, $dataLocacao, $dataDevolucao) {
        $query = "SELECT cod_locacao FROM locacao WHERE cod_automovel = :placaAutomovel 
                  AND (data_devolucao BETWEEN :dataLocacao AND :dataDevolucao 
                  OR data_alocacao BETWEEN :dataLocacao AND :dataDevolucao)";
        $stm = $this->db->prepare($query);
        $stm->bindParam(':placaAutomovel', $placaAutomovel);
        $stm->bindParam(':dataLocacao', $dataLocacao);
        $stm->bindParam(':dataDevolucao', $dataDevolucao);
        $stm->execute();
        return $stm->fetch() ? true : false;
    }

    public function getValorDiaria($placaAutomovel) {
        $query = "SELECT valor FROM automovel WHERE placa = :placaAutomovel";
        $stm = $this->db->prepare($query);
        $stm->bindParam(':placaAutomovel', $placaAutomovel);
        $stm->execute();
        return $stm->fetchColumn();
    }

    public function inserirLocacao($valor, $dataLocacao, $dataDevolucao, $placaAutomovel) {
        $query = "INSERT INTO locacao(valor_total, data_devolucao, data_alocacao, cod_automovel) 
                  VALUES (:valor, :dataDevolucao, :dataLocacao, :placaAutomovel)";
        $stm = $this->db->prepare($query);
        $stm->bindParam(':valor', $valor);
        $stm->bindParam(':dataDevolucao', $dataDevolucao);
        $stm->bindParam(':dataLocacao', $dataLocacao);
        $stm->bindParam(':placaAutomovel', $placaAutomovel);
        $stm->execute();
        return $this->db->lastInsertId();
    }

    public function getClienteId($cpfCliente) {
        $query = "SELECT c.cod_cliente FROM cliente c, usuario u WHERE u.cpf = :cpfCliente";
        $stm = $this->db->prepare($query);
        $stm->bindParam(':cpfCliente', $cpfCliente);
        $stm->execute();
        return $stm->fetchColumn();
    }

    public function inserirReserva($placaAutomovel, $codCliente, $lastId) {
        $query = "INSERT INTO reserva(cod_automovel, status, cod_cliente, cod_locacao) 
                  VALUES(:placaAutomovel, '1', :codCliente, :lastId)";
        $stm = $this->db->prepare($query);
        $stm->bindParam(':placaAutomovel', $placaAutomovel);
        $stm->bindParam(':codCliente', $codCliente);
        $stm->bindParam(':lastId', $lastId);
        return $stm->execute();
    }
}
?>
