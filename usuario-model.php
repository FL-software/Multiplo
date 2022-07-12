<?php
    include "usuario.php";

    $acao = $_REQUEST["acao"];
    $usuario = new Usuario();

    switch($acao)
    {
        case 'inserir':
            $nome = $_POST["nome"];
            $login = $_POST["login"];
            $senha = $_POST["senha"];
            $ativo = $_POST["ativo"];
            $idperfil = $_POST["idperfil"];
            $inserir = $usuario -> inserir($nome, $login, $senha, $ativo, $idperfil);
            break;
        case 'excluir':
            $ID = $_GET["ID"];
            $excluir = $usuario -> excluir($ID);
            break;
        case 'editar':
            $ID = $_GET["ID"];
            $editar = $usuario -> selecionar($ID);
            break;
        case 'alterar':
            $ID = $_POST["ID"];
            $nome = $_POST["nome"];
            $login = $_POST["login"];
            $senha = $_POST["senha"];
            $ativo = $_POST["ativo"];
            $idperfil = $_POST["idperfil"];
            $alterar = $usuario -> alterar($ID, $nome, $login, $senha, $ativo, $idperfil);
            break;
    }    
?>