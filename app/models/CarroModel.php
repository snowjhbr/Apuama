<?php
class CarroModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function atualizarCarro($carroData) {
        $query = "UPDATE automovel SET cor = :cor, chassis = :chassis, direcao_assistida = :direcao, ar_condicionado = :arCondicionado, manutencao = :manutencao, nro_de_porta = :nroDePorta, quilometragem = :quilometragem, transmissao = :transmissao, marca = :marca, tipo_de_combustivel = :tipoDeCombustivel, renavam = :renavam, status = :status, tipo = :tipo, valor = :valor WHERE placa = :placa";
        $stm = $this->db->prepare($query);
        
        $stm->bindParam(':cor', $carroData['corAutomovel']);
        $stm->bindParam(':chassis', $carroData['chassisAutomovel']);
        $stm->bindParam(':direcao', $carroData['direcaoAutomovel']);
        $stm->bindParam(':arCondicionado', $carroData['arCondicionadoAutomovel']);
        $stm->bindParam(':manutencao', $carroData['manutencaoAutomovel']);
        $stm->bindParam(':nroDePorta', $carroData['nroDePortaAutomovel']);
        $stm->bindParam(':quilometragem', $carroData['quilometragemAutomovel']);
        $stm->bindParam(':transmissao', $carroData['transmissaoAutomovel']);
        $stm->bindParam(':marca', $carroData['marcaAutomovel']);
        $stm->bindParam(':tipoDeCombustivel', $carroData['tipoDeCombustivelAutomovel']);
        $stm->bindParam(':renavam', $carroData['renavamAutomovel']);
        $stm->bindParam(':status', $carroData['statusAutomovel']);
        $stm->bindParam(':tipo', $carroData['tipoAutomovel']);
        $stm->bindParam(':valor', $carroData['valorAutomovel']);
        $stm->bindParam(':placa', $carroData['placaAutomovel']);

        return $stm->execute();
    }
}
?>
