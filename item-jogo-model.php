<?php
    include "item-jogo.php";

    $acao = $_REQUEST["acao"];
    $itemJogo = new ItemJogo();

    switch($acao)
    {
        case 'inserir':
            $ativo = $_POST["ativo"];
            $iditem = $_POST["iditem"];
            $idjogo = $_POST["idjogo"];
            $inserir = $itemJogo -> inserir($ativo, $iditem, $idjogo);
            break;
        case 'excluir':
            $ID = $_GET["ID"];
            $excluir = $itemJogo -> excluir($ID);
            break;
        case 'editar':
            $ID = $_GET["ID"];
            $editar = $itemJogo -> selecionar($ID);
            break;
        case 'alterar':
            $ID = $_POST["ID"];
            $ativo = $_POST["ativo"];
            $iditem = $_POST["iditem"];
            $idjogo = $_POST["idjogo"];
            $alterar = $itemJogo -> alterar($ID, $ativo, $iditem, $idjogo);
            break;
    }    
?>