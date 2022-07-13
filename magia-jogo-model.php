<?php
    include "magia-jogo.php";

    $acao = $_REQUEST["acao"];
    $magiaJogo = new MagiaJogo();

    switch($acao)
    {
        case 'inserir':
            $ativo = $_POST["ativo"];
            $idmagia = $_POST["idmagia"];
            $idjogo = $_POST["idjogo"];
            $inserir = $magiaJogo -> inserir($ativo, $idmagia, $idjogo);
            break;
        case 'excluir':
            $ID = $_GET["ID"];
            $excluir = $magiaJogo -> excluir($ID);
            break;
        case 'editar':
            $ID = $_GET["ID"];
            $editar = $magiaJogo -> selecionar($ID);
            break;
        case 'alterar':
            $ID = $_POST["ID"];
            $ativo = $_POST["ativo"];
            $idmagia = $_POST["idmagia"];
            $idjogo = $_POST["idjogo"];
            $alterar = $magiaJogo -> alterar($ID, $ativo, $idmagia, $idjogo);
            break;
    }    
?>