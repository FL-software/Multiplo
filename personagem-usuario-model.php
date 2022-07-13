<?php
    include "personagem-usuario.php";

    $acao = $_REQUEST["acao"];
    $personagemUsuario = new PersonagemUsuario();

    switch($acao)
    {
        case 'inserir':
            $ativo = $_POST["ativo"];
            $idpersonagem = $_POST["idpersonagem"];
            $idusuario = $_POST["idusuario"];
            $inserir = $personagemUsuario -> inserir($ativo, $idpersonagem, $idusuario);
            break;
        case 'excluir':
            $ID = $_GET["ID"];
            $excluir = $personagemUsuario -> excluir($ID);
            break;
        case 'editar':
            $ID = $_GET["ID"];
            $editar = $personagemUsuario -> selecionar($ID);
            break;
        case 'alterar':
            $ID = $_POST["ID"];
            $ativo = $_POST["ativo"];
            $idpersonagem = $_POST["idpersonagem"];
            $idusuario = $_POST["idusuario"];
            $alterar = $personagemUsuario -> alterar($ID, $ativo, $idpersonagem, $idusuario);
            break;
    }    
?>