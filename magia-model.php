<?php
    include "magia.php";

    $acao = $_REQUEST["acao"];
    $magia = new Magia();

    switch($acao)
    {
        case 'inserir':            
            $nome = $_POST["nome"];
            $descricao = $_POST["descricao"];
            $ativo = $_POST["ativo"];                      
            $inserir = $magia -> inserir($nome,$descricao,$ativo);
            break;
        case 'excluir':
            $ID = $_GET["ID"];
            $excluir = $magia -> excluir($ID);
            break;        
        case 'editar':
            $ID = $_GET["ID"];
            $editar = $magia -> selecionar($ID);
            break;            
        case 'alterar':
            $ID = $_POST["ID"];            
            $nome = $_POST["nome"];
            $descricao = $_POST["descricao"];
            $ativo = $_POST["ativo"];                
            $alterar = $magia -> alterar($ID, $nome, $descricao, $ativo);
            break;
    }    
?>