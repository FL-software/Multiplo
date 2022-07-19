<?php
    class Log {
        public function listar() {
            $conexao = new Conexao();
            $con = $conexao -> conectarBanco();

            mysqli_set_charset($con,'utf8');

            $consulta = "SELECT * FROM Log order by ID";
            $resultado = mysqli_query($con, $consulta) or die ("Falha na execução da consulta!");

            while($linha = mysqli_fetch_assoc($resultado))
            {
                $ID = $linha['ID'];
                $Acao = $linha["Acao"];
                $Descricao = $linha["Descricao"];
                $DataAcao = $linha["DataAcao"];
                $Entidade = $linha["Entidade"];
                $Chave = $linha["Chave"];
                $IDUsuario = $this -> obter_nome_perfil($linha["IDUsuario"]);

                echo "<tr>";
                echo "<td>$ID</td>";
                echo "<td>$Acao</td>";
                echo "<td>$Descricao</td>";
                echo "<td>$DataAcao</td>";
                echo "<td>$Entidade</td>";
                echo "<td>$Chave</td>";
                echo "<td>$IDUsuario</td>";
                echo "</tr>";
            }
        }

        public function inserir($Acao, $Descricao, $Entidade, $Chave, $IDUsuario) {
            $conexao = new Conexao();
            $con = $conexao -> conectarBanco();

            mysqli_set_charset($con,'utf8');

            $Descricao = str_replace("'","",$Descricao);  
            $DataAcao = date("Y-m-d H:i:s");      
            $consulta = "INSERT INTO Log (Acao, Descricao, DataAcao, Entidade, Chave, IDUsuario) VALUES ('$Acao', '$Descricao', '$DataAcao', '$Entidade', '$Chave', $IDUsuario)";
            $resultado = mysqli_query($con, $consulta) or die ("Falha ao tentar adicionar dados!");
        }

        public function obter_nome_perfil($ID) {
            $conexao = new Conexao();
            $con = $conexao -> conectarBanco();

            mysqli_set_charset($con,'utf8');

            $consulta = "SELECT * FROM Usuario WHERE ID = $ID";
            $resultado = mysqli_query($con, $consulta) or die ("Falha na execução da consulta!");

            if($linha = mysqli_fetch_assoc($resultado))
            {
                $Nome = $linha["Nome"];

                return $Nome;
            }
        }
    }
?>