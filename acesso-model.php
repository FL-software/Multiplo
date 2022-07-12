<?php
    include "acesso.php";

    $acao = $_REQUEST["acao"];
    $acesso = new Acesso();

    switch($acao)
    {
        case 'inserir':
            $ativo = $_POST["ativo"];
            $idperfil = $_POST["idperfil"];
            $idmenu = $_POST["idmenu"];
            $inserir = $acesso -> inserir($ativo, $idperfil, $idmenu);
            break;
        case 'excluir':
            $ID = $_GET["ID"];
            $excluir = $acesso -> excluir($ID);
            break;
        case 'editar':
            $ID = $_GET["ID"];
            $editar = $acesso -> selecionar($ID);
            break;
        case 'alterar':
            $ID = $_POST["ID"];
            $ativo = $_POST["ativo"];
            $idperfil = $_POST["idperfil"];
            $idmenu = $_POST["idmenu"];
            $alterar = $acesso -> alterar($ID, $ativo, $idperfil, $idmenu);
            break;
    }    
?>