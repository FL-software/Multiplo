<?php
    include "item.php";

    $acao = $_REQUEST["acao"];
    $item = new Item();

    switch($acao)
    {
        case 'inserir':            
            $nome = $_POST["nome"];
            $descricao = $_POST["descricao"];
            $ativo = $_POST["ativo"];                      
            $inserir = $item -> inserir($nome,$descricao,$ativo);
            break;
        case 'excluir':
            $ID = $_GET["ID"];
            $excluir = $item -> excluir($ID);
            break;        
        case 'editar':
            $ID = $_GET["ID"];
            $editar = $item -> selecionar($ID);
            break;            
        case 'alterar':
            $ID = $_POST["ID"];            
            $nome = $_POST["nome"];
            $descricao = $_POST["descricao"];
            $ativo = $_POST["ativo"];                
            $alterar = $item -> alterar($ID, $nome, $descricao, $ativo);
            break;
    }    
?>