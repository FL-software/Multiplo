<?php
    include "historia.php";

    $acao = $_REQUEST["acao"];
    $historia = new Historia();

    switch($acao)
    {
        case 'inserir':
            $nome = $_POST["nome"];
            $descricao = $_POST["descricao"];
            $ativo = $_POST["ativo"];
            $idcenario = $_POST["idcenario"];
            $inserir = $historia -> inserir($nome, $descricao, $ativo, $idcenario);
            break;
        case 'excluir':
            $ID = $_GET["ID"];
            $excluir = $historia -> excluir($ID);
            break;
        case 'editar':
            $ID = $_GET["ID"];
            $editar = $historia -> selecionar($ID);
            break;
        case 'alterar':
            $ID = $_POST["ID"];
            $nome = $_POST["nome"];
            $descricao = $_POST["descricao"];
            $ativo = $_POST["ativo"];
            $idcenario = $_POST["idcenario"];
            $alterar = $historia -> alterar($ID, $nome, $descricao, $ativo, $idcenario);
            break;
    }    
?>