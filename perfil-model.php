<?php
    include "perfil.php";

    $acao = $_REQUEST["acao"];
    $perfil = new Perfil();

    switch($acao)
    {
        case 'inserir':            
            $nome = $_POST["nome"];
            $descricao = $_POST["descricao"];
            $ativo = $_POST["ativo"];                      
            $inserir = $perfil -> inserir($nome,$descricao,$ativo);
            break;
        case 'excluir':
            $ID = $_GET["ID"];
            $excluir = $perfil -> excluir($ID);
            break;        
        case 'editar':
            $ID = $_GET["ID"];
            $editar = $perfil -> selecionar($ID);
            break;            
        case 'alterar':
            $ID = $_POST["ID"];            
            $nome = $_POST["nome"];
            $descricao = $_POST["descricao"];
            $ativo = $_POST["ativo"];                
            $alterar = $perfil -> alterar($ID, $nome, $descricao, $ativo);
            break;
    }    
?>