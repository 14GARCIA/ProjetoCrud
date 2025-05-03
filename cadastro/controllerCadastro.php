<?php
include_once "modelCadastro.php";
include_once "cadastro.php";

$cpf = filter_input(INPUT_GET, "cpf");
$nome = filter_input(INPUT_GET, "nome");
$idade = filter_input(INPUT_GET, "idade");
$acao = filter_input(INPUT_GET, "acao");

$pessoa = new Cadastro();
$pessoa->setCpf($cpf);
$pessoa->setNome($nome);
$pessoa->setIdade($idade);

$modelCadastro = new ModelCadastro();

if ($acao == "inserir") {
    $modelCadastro->inserir($pessoa);
} else if ($acao == "apagar") {
    $modelCadastro->apagar($pessoa);
}
?>
