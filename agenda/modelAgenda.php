<?php
include_once "conexao.php";
include_once "agenda.php";

class ModelAgenda{
    public function inserir(Agenda $agenda) {
        $sql = "INSERT INTO agenda (cpf, data, descricao) VALUES (?, ?, ?)";
        $bd = Conexao::pegarConexao();

        $stm = $bd->prepare($sql);
        $stm->bindValue(1, $agenda->getCpf());
        $stm->bindValue(2, $agenda->getData());
        $stm->bindValue(3, $agenda->getDescricao());

        $resultado = $stm->execute();
        if ($resultado) {
            echo "Agendado com sucesso!";
        } else {
            echo "Erro ao agendar.";
        }
    }

    public function apagar(agenda $agenda) {
        $sql = "DELETE FROM agenda WHERE cpf = ?";
        $bd = Conexao::pegarConexao();

        $stm = $bd->prepare($sql);
        $stm->bindValue(1, $agenda->getCpf());

        $resultado = $stm->execute();
        if ($resultado) {
            echo "Apagado com sucesso!";
        } else {
            echo "Erro ao apagar.";
        }
    }
    public function atualizar(Agenda $agenda) {
        $sql = "update agenda set data=?, descricao=? where cpf=? ";
        $bd = Conexao::pegarConexao();

        $stm = $bd->prepare($sql);
        $stm->bindValue(1, $agenda->getData());
        $stm->bindValue(2, $agenda->getDescricao());
        $stm->bindValue(3, $agenda->getCpf());

        $resultado = $stm->execute();
        if ($resultado) {
            echo "atualizado com sucesso!";
        } else {
            echo "Erro ao atualizar.";
        }
    }

    public function consultar() {
        $sql = "SELECT a.cpf, p.nome, a.data, a.descricao
                FROM agenda a
                INNER JOIN pessoa p ON a.cpf = p.cpf";
        
        $con = new Conexao();
        $bd = $con->pegarConexao();
    
        $stm = $bd->prepare($sql);
        $stm->execute();
        
        if ($stm->rowCount() > 0) {
            $resultado = $stm->fetchAll(\PDO::FETCH_ASSOC);
            return json_encode($resultado);
        } else {
            return json_encode([]); 
        }
    }}
    
?>
