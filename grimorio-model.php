<?php
    include "grimorio.php";

    $acao = $_REQUEST["acao"];
    $grimorio = new Grimorio();

    switch($acao)
    {
        case 'inserir':
            $ativo = $_POST["ativo"];
            $idpersonagemusuario = $_POST["idpersonagemusuario"];
            $idmagia = $_POST["idmagia"];
            $inserir = $grimorio -> inserir($ativo, $idpersonagemusuario, $idmagia);
            break;
        case 'excluir':
            $ID = $_GET["ID"];
            $excluir = $grimorio -> excluir($ID);
            break;
        case 'editar':
            $ID = $_GET["ID"];
            $editar = $grimorio -> selecionar($ID);
            break;
        case 'alterar':
            $ID = $_POST["ID"];
            $ativo = $_POST["ativo"];
            $idpersonagemusuario = $_POST["idpersonagemusuario"];
            $idmagia = $_POST["idmagia"];
            $alterar = $grimorio -> alterar($ID, $ativo, $idpersonagemusuario, $idmagia);
            break;
    }    
?>