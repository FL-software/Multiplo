<?php
    include "regra.php";

    $acao = $_REQUEST["acao"];
    $regra = new Regra();

    switch($acao)
    {
        case 'inserir':
            $nome = $_POST["nome"];
            $descricao = $_POST["descricao"];
            $ativo = $_POST["ativo"];
            $idjogo = $_POST["idjogo"];
            $inserir = $regra -> inserir($nome, $descricao, $ativo, $idjogo);
            break;
        case 'excluir':
            $ID = $_GET["ID"];
            $excluir = $regra -> excluir($ID);
            break;
        case 'editar':
            $ID = $_GET["ID"];
            $editar = $regra -> selecionar($ID);
            break;
        case 'alterar':
            $ID = $_POST["ID"];
            $nome = $_POST["nome"];
            $descricao = $_POST["descricao"];
            $ativo = $_POST["ativo"];
            $idjogo = $_POST["idjogo"];
            $alterar = $regra -> alterar($ID, $nome, $descricao, $ativo, $idjogo);
            break;
    }    
?>