<?php
    include "participacao.php";

    $acao = $_REQUEST["acao"];
    $participacao = new Participacao();

    switch($acao)
    {
        case 'inserir':
            $ativo = $_POST["ativo"];
            $idpersonagemusuario = $_POST["idpersonagemusuario"];
            $idpartida = $_POST["idpartida"];
            $inserir = $participacao -> inserir($ativo, $idpersonagemusuario, $idpartida);
            break;
        case 'excluir':
            $ID = $_GET["ID"];
            $excluir = $participacao -> excluir($ID);
            break;
        case 'editar':
            $ID = $_GET["ID"];
            $editar = $participacao -> selecionar($ID);
            break;
        case 'alterar':
            $ID = $_POST["ID"];
            $ativo = $_POST["ativo"];
            $idpersonagemusuario = $_POST["idpersonagemusuario"];
            $idpartida = $_POST["idpartida"];
            $alterar = $participacao -> alterar($ID, $ativo, $idpersonagemusuario, $idpartida);
            break;
    }    
?>