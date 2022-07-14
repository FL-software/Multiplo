<?php
    include "aliado.php";

    $acao = $_REQUEST["acao"];
    $aliado = new Aliado();

    switch($acao)
    {
        case 'inserir':
            $ativo = $_POST["ativo"];
            $idpersonagemusuarioa = $_POST["idpersonagemusuarioa"];
            $idpersonagemusuariob = $_POST["idpersonagemusuariob"];
            $inserir = $aliado -> inserir($ativo, $idpersonagemusuarioa, $idpersonagemusuariob);
            break;
        case 'excluir':
            $ID = $_GET["ID"];
            $excluir = $aliado -> excluir($ID);
            break;
        case 'editar':
            $ID = $_GET["ID"];
            $editar = $aliado -> selecionar($ID);
            break;
        case 'alterar':
            $ID = $_POST["ID"];
            $ativo = $_POST["ativo"];
            $idpersonagemusuarioa = $_POST["idpersonagemusuarioa"];
            $idpersonagemusuariob = $_POST["idpersonagemusuariob"];
            $alterar = $aliado -> alterar($ID, $ativo, $idpersonagemusuarioa, $idpersonagemusuariob);
            break;
    }    
?>