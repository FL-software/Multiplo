<?php
    include "inventario.php";

    $acao = $_REQUEST["acao"];
    $inventario = new Inventario();

    switch($acao)
    {
        case 'inserir':
            $ativo = $_POST["ativo"];
            $idpersonagemusuario = $_POST["idpersonagemusuario"];
            $iditem = $_POST["iditem"];
            $inserir = $inventario -> inserir($ativo, $idpersonagemusuario, $iditem);
            break;
        case 'excluir':
            $ID = $_GET["ID"];
            $excluir = $inventario -> excluir($ID);
            break;
        case 'editar':
            $ID = $_GET["ID"];
            $editar = $inventario -> selecionar($ID);
            break;
        case 'alterar':
            $ID = $_POST["ID"];
            $ativo = $_POST["ativo"];
            $idpersonagemusuario = $_POST["idpersonagemusuario"];
            $iditem = $_POST["iditem"];
            $alterar = $inventario -> alterar($ID, $ativo, $idpersonagemusuario, $iditem);
            break;
    }    
?>