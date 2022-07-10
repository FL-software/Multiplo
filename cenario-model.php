<?php
    include "cenario.php";

    $acao = $_REQUEST["acao"];
    $cenario = new Cenario();

    switch($acao)
    {
        case 'inserir':
            $nome = $_POST["nome"];
            $descricao = $_POST["descricao"];
            $ativo = $_POST["ativo"];
            $idjogo = $_POST["idjogo"];
            $inserir = $cenario -> inserir($nome, $descricao, $ativo, $idjogo);
            break;
        case 'excluir':
            $ID = $_GET["ID"];
            $excluir = $cenario -> excluir($ID);
            break;
        case 'editar':
            $ID = $_GET["ID"];
            $editar = $cenario -> selecionar($ID);
            break;
        case 'alterar':
            $ID = $_POST["ID"];
            $nome = $_POST["nome"];
            $descricao = $_POST["descricao"];
            $ativo = $_POST["ativo"];
            $idjogo = $_POST["idjogo"];
            $alterar = $cenario -> alterar($ID, $nome, $descricao, $ativo, $idjogo);
            break;
    }    
?>