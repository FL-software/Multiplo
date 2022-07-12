<?php
    include "posicao.php";

    $acao = $_REQUEST["acao"];
    $posicao = new Posicao();

    switch($acao)
    {
        case 'inserir':
            $x = $_POST["x"];
            $y = $_POST["y"];
            $ativo = $_POST["ativo"];
            $idtabuleiro = $_POST["idtabuleiro"];
            $inserir = $posicao -> inserir($x, $y, $ativo, $idtabuleiro);
            break;
        case 'excluir':
            $ID = $_GET["ID"];
            $excluir = $posicao -> excluir($ID);
            break;
        case 'editar':
            $ID = $_GET["ID"];
            $editar = $posicao -> selecionar($ID);
            break;
        case 'alterar':
            $ID = $_POST["ID"];
            $x = $_POST["x"];
            $y = $_POST["y"];
            $ativo = $_POST["ativo"];
            $idtabuleiro = $_POST["idtabuleiro"];
            $alterar = $posicao -> alterar($ID, $x, $y, $ativo, $idtabuleiro);
            break;
    }    
?>