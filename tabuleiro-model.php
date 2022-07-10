<?php
    include "tabuleiro.php";

    $acao = $_REQUEST["acao"];
    $tabuleiro = new Tabuleiro();

    switch($acao)
    {
        case 'inserir':
            $nome = $_POST["nome"];
            $descricao = $_POST["descricao"];
            $ativo = $_POST["ativo"];
            $idjogo = $_POST["idjogo"];
            $inserir = $tabuleiro -> inserir($nome, $descricao, $ativo, $idjogo);
            break;
        case 'excluir':
            $ID = $_GET["ID"];
            $excluir = $tabuleiro -> excluir($ID);
            break;
        case 'editar':
            $ID = $_GET["ID"];
            $editar = $tabuleiro -> selecionar($ID);
            break;
        case 'alterar':
            $ID = $_POST["ID"];
            $nome = $_POST["nome"];
            $descricao = $_POST["descricao"];
            $ativo = $_POST["ativo"];
            $idjogo = $_POST["idjogo"];
            $alterar = $tabuleiro -> alterar($ID, $nome, $descricao, $ativo, $idjogo);
            break;
    }    
?>