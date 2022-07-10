<?php
    include "menu.php";

    $acao = $_REQUEST["acao"];
    $menu = new Menu();

    switch($acao)
    {
        case 'inserir':            
            $nome = $_POST["nome"];
            $descricao = $_POST["descricao"];
            $ativo = $_POST["ativo"];                      
            $inserir = $menu -> inserir($nome,$descricao,$ativo);
            break;
        case 'excluir':
            $ID = $_GET["ID"];
            $excluir = $menu -> excluir($ID);
            break;        
        case 'editar':
            $ID = $_GET["ID"];
            $editar = $menu -> selecionar($ID);
            break;            
        case 'alterar':
            $ID = $_POST["ID"];            
            $nome = $_POST["nome"];
            $descricao = $_POST["descricao"];
            $ativo = $_POST["ativo"];                
            $alterar = $menu -> alterar($ID, $nome, $descricao, $ativo);
            break;
    }    
?>