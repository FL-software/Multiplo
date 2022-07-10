<?php
    include "partida.php";

    $acao = $_REQUEST["acao"];
    $partida = new Partida();

    switch($acao)
    {
        case 'inserir':
            $nome = $_POST["nome"];
            $descricao = $_POST["descricao"];
            $ativo = $_POST["ativo"];
            $idjogo = $_POST["idjogo"];
            $inserir = $partida -> inserir($nome, $descricao, $ativo, $idjogo);
            break;
        case 'excluir':
            $ID = $_GET["ID"];
            $excluir = $partida -> excluir($ID);
            break;
        case 'editar':
            $ID = $_GET["ID"];
            $editar = $partida -> selecionar($ID);
            break;
        case 'alterar':
            $ID = $_POST["ID"];
            $nome = $_POST["nome"];
            $descricao = $_POST["descricao"];
            $ativo = $_POST["ativo"];
            $idjogo = $_POST["idjogo"];
            $alterar = $partida -> alterar($ID, $nome, $descricao, $ativo, $idjogo);
            break;
    }    
?>