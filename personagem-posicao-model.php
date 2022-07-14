<?php
    include "personagem-posicao.php";

    $acao = $_REQUEST["acao"];
    $personagemPosicao = new PersonagemPosicao();

    switch($acao)
    {
        case 'inserir':
            $ativo = $_POST["ativo"];
            $idpersonagemusuario = $_POST["idpersonagemusuario"];
            $idposicao = $_POST["idposicao"];
            $inserir = $personagemPosicao -> inserir($ativo, $idpersonagemusuario, $idposicao);
            break;
        case 'excluir':
            $ID = $_GET["ID"];
            $excluir = $personagemPosicao -> excluir($ID);
            break;
        case 'editar':
            $ID = $_GET["ID"];
            $editar = $personagemPosicao -> selecionar($ID);
            break;
        case 'alterar':
            $ID = $_POST["ID"];
            $ativo = $_POST["ativo"];
            $idpersonagemusuario = $_POST["idpersonagemusuario"];
            $idposicao = $_POST["idposicao"];
            $alterar = $personagemPosicao -> alterar($ID, $ativo, $idpersonagemusuario, $idposicao);
            break;
    }    
?>