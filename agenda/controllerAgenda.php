<?php
include_once "modelAgenda.php";
include_once "agenda.php";


$cpf = filter_input(INPUT_GET, "cpf");
$data = filter_input(INPUT_GET, "data");
$descricao = filter_input(INPUT_GET, "descricao");
$acao = filter_input(INPUT_GET, "acao");

$agenda = new Agenda();
$agenda->setCpf($cpf);
$agenda->setData($data);
$agenda->setDescricao($descricao);



$ModelAgenda = new ModelAgenda();

if ($acao == "inserir") {
    $ModelAgenda->inserir($agenda);
} else if ($acao == "apagar") {
    $ModelAgenda->apagar($agenda);
}else if($acao == "atualizar"){
    $ModelAgenda-> atualizar($agenda);
}else if($acao == "consultar"){
  echo  $ModelAgenda -> consultar();
}
?>