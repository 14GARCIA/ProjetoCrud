<?php
include_once "conexao.php";
include_once "cadastro.php";

class ModelCadastro {
    public function inserir(Cadastro $pessoa) {
        $sql = "INSERT INTO pessoa (cpf, nome, idade) VALUES (?, ?, ?)";
        $bd = Conexao::pegarConexao();

        $stm = $bd->prepare($sql);
        $stm->bindValue(1, $pessoa->getCpf());
        $stm->bindValue(2, $pessoa->getNome());
        $stm->bindValue(3, $pessoa->getIdade());

        $resultado = $stm->execute();
        if ($resultado) {
            echo "Cadastrado com sucesso!";
        } else {
            echo "Erro ao cadastrar.";
        }
    }

    public function apagar(Cadastro $pessoa) {
        $sql = "DELETE FROM pessoa WHERE cpf = ?";
        $bd = Conexao::pegarConexao();

        $stm = $bd->prepare($sql);
        $stm->bindValue(1, $pessoa->getCpf());

        $resultado = $stm->execute();
        if ($resultado) {
            echo "Apagado com sucesso!";
        } else {
            echo "Erro ao apagar.";
        }
    }


    public function atualizar(Cadastro $pessoa) {
        $sql = " update pessoa (cpf, nome, idade) VALUES (?, ?, ?)";
        $bd = Conexao::pegarConexao();
    
        $stm = $bd->prepare($sql);
        $stm->bindValue(1, $pessoa->getCpf());
        $stm->bindValue(2, $pessoa->getNome());
        $stm->bindValue(3, $pessoa->getIdade());
    
        $resultado = $stm->execute();
        if ($resultado) {
            echo "Cadastrado com sucesso!";
        } else {
            echo "Erro ao cadastrar.";
        }
    }


}

?>
