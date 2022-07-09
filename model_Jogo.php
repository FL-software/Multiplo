<?php
    include "Jogo.php";

    $acao = $_REQUEST["acao"];
    $jogo = new Jogo();

    switch($acao)
    {
        case 'inserir':            
            $nome = $_POST["nome"];
            $descricao = $_POST["descricao"];
            $ativo = $_POST["ativo"];                      
            $inserir = $jogo -> inserir($nome,$descricao,$ativo);
            break;
        case 'excluir':
            $ID = $_GET["ID"];
            $excluir = $jogo -> excluir($ID);
            break;        
        case 'editar':
            $ID = $_GET["ID"];
            $editar = $jogo -> selecionar($ID);
            break;            
        case 'alterar':
            $ID = $_POST["ID"];            
            $nome = $_POST["nome"];
            $descricao = $_POST["descricao"];
            $ativo = $_POST["ativo"];                
            $alterar = $jogo -> alterar($ID, $nome, $descricao, $ativo);
            break;
    }    
?>