<?php
    include "Personagem.php";

    $acao = $_REQUEST["acao"];
    $personagem = new Personagem();

    switch($acao)
    {
        case 'inserir':            
            $nome = $_POST["nome"];
            $descricao = $_POST["descricao"];
            $imagem = $_POST["imagem"];
            $tipo = $_POST["tipo"];
            $faccao = $_POST["faccao"];
            $ativo = $_POST["ativo"];                      
            $inserir = $personagem -> inserir($nome,$descricao,$imagem,$tipo,$faccao,$ativo);
            break;
        case 'excluir':
            $ID = $_GET["ID"];
            $excluir = $personagem -> excluir($ID);
            break;        
        case 'editar':
            $ID = $_GET["ID"];
            $editar = $personagem -> selecionar($ID);
            break;            
        case 'alterar':
            $ID = $_POST["ID"];            
            $nome = $_POST["nome"];
            $descricao = $_POST["descricao"];
            $imagem = $_POST["imagem"];
            $tipo = $_POST["tipo"];
            $faccao = $_POST["faccao"];
            $ativo = $_POST["ativo"];                
            $alterar = $personagem -> alterar($ID,$nome,$descricao,$imagem,$tipo,$faccao,$ativo);
            break;
    }    
?>