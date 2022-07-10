<?php
    include "conexao.php";

    class Personagem {   
        public function listar() {
            $conexao = new Conexao();
            $con = $conexao -> conectarBanco();

            mysqli_set_charset($con,'utf8');
    
            $consulta = "SELECT * FROM personagem order by ID";       
            $resultado = mysqli_query($con,$consulta) or die ("Falha na execução da consulta!");
            
            while($linha = mysqli_fetch_assoc($resultado))
            {                    
                $ID = $linha['ID'];
                $Nome = $linha["Nome"];
                $Descricao = $linha["Descricao"];
                $Imagem = $linha["Imagem"];
                $Tipo = $linha["Tipo"];
                $Faccao = $linha["Faccao"];
                $Ativo = ord($linha["Ativo"]) ? 'checked' : '';                
                
                echo "<tr>";
                echo "<td>$ID</td>";
                echo "<td>$Nome</td>";
                echo "<td>$Descricao</td>";
                echo "<td>$Imagem</td>";
                echo "<td>$Tipo</td>";
                echo "<td>$Faccao</td>";
                echo "<td><input type='checkbox' id='Ativo' $Ativo disabled></td>";                
                echo "<td><button class='btn btn-success editar' id='$ID'>Editar</button></td>";
                echo "<td><button class='btn btn-danger excluir' id='$ID'>Excluir</button></td>";    
                echo "</tr>";
            }
        }

        public function inserir($Nome,$Descricao,$Imagem,$Tipo,$Faccao,$Ativo) {
            $conexao = new Conexao();
            $con = $conexao -> conectarBanco();

            mysqli_set_charset($con,'utf8');
        
            $consulta = "INSERT INTO personagem (Nome, Descricao, Ativo) VALUES ('$Nome', '$Descricao', '$Imagem', '$Tipo', '$Faccao', $Ativo)";
            $resultado = mysqli_query($con, $consulta) or die ("Falha ao tentar adicionar dados!");
            
            echo "Dados adicionados com sucesso!";
        }
    
        public function excluir($ID) {
            $conexao = new Conexao();
            $con = $conexao-> conectarBanco();    
            $query = "DELETE FROM personagem WHERE ID = $ID";
            $resultado = mysqli_query($con, $query) or die('Falha ao tentar excluir registro!');
            
            echo "Registro excluido com sucesso!";		
        }

        public function selecionar($ID) {
            $conexao = new Conexao();
            $con = $conexao-> conectarBanco();

            mysqli_set_charset($con,'utf8');

            $consulta = "SELECT * FROM personagem WHERE ID = $ID";

            if ($resultado = mysqli_query($con, $consulta)) {   
                while ($linha = mysqli_fetch_assoc($resultado)) { 
                    ?>			   
                        <p><input id="editar_ID" type="text" disabled value="<?php echo $linha['ID']; ?>"> </p>			
                        <p><input id="editar_nome" type="text" value="<?php echo $linha['Nome']; ?>"></p>
                        <p><input id="editar_descricao" type="text" value="<?php echo $linha['Descricao']; ?>"></p>
                        <p><input id="editar_imagem" type="text" value="<?php echo $linha['Imagem']; ?>"></p>
                        <p><input id="editar_tipo" type="text" value="<?php echo $linha['Tipo']; ?>"></p>
                        <p><input id="editar_faccao" type="text" value="<?php echo $linha['Faccao']; ?>"></p> 
                        <p><input id="editar_ativo" type="checkbox" <?php echo ord($linha['Ativo']) ? 'checked' : ''; ?>></p>
                    <?php  	                    
                }
            }
        }
        
        public function alterar($ID, $Nome, $Descricao, $Imagem, $Tipo, $Faccao, $Ativo) {
            $conexao = new Conexao();
            $con = $conexao-> conectarBanco();

            mysqli_set_charset($con,'utf8');

            $consulta = "UPDATE personagem SET Nome = '$Nome', Descricao = '$Descricao', Imagem = '$Imagem', Tipo = '$Tipo',Faccao = '$Faccao', Ativo = $Ativo WHERE ID = $ID";            
            $resultado = mysqli_query($con, $consulta) or die("Falha ao tentar alterar dados!");

            echo "Dados alterados com sucesso!";	
        }
    }
?>