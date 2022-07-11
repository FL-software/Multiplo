<?php
    include "capitulo.php";

    $acao = $_REQUEST["acao"];
    $capitulo = new Capitulo();

    switch($acao)
    {
        case 'inserir':
            $titulo = $_POST["titulo"];
            $texto = $_POST["texto"];
            $ativo = $_POST["ativo"];
            $idhistoria = $_POST["idhistoria"];
            $inserir = $capitulo -> inserir($titulo, $texto, $ativo, $idhistoria);
            break;
        case 'excluir':
            $ID = $_GET["ID"];
            $excluir = $capitulo -> excluir($ID);
            break;
        case 'editar':
            $ID = $_GET["ID"];
            $editar = $capitulo -> selecionar($ID);
            break;
        case 'alterar':
            $ID = $_POST["ID"];
            $titulo = $_POST["titulo"];
            $texto = $_POST["texto"];
            $ativo = $_POST["ativo"];
            $idhistoria = $_POST["idhistoria"];
            $alterar = $capitulo -> alterar($ID, $titulo, $texto, $ativo, $idhistoria);
            break;
    }    
?>