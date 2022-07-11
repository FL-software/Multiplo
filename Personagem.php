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
                echo "<td><button class='btn btn-danger excluir' nome='$Nome' id='$ID'>Desativar</button>";
                echo "<button class='btn btn-success editar' nome='$Nome' id='$ID'>Editar</button></td>";
                echo "</tr>";
            }
        }

        public function inserir($Nome,$Descricao,$Imagem,$Tipo,$Faccao,$Ativo) {
            $conexao = new Conexao();
            $con = $conexao -> conectarBanco();

            mysqli_set_charset($con,'utf8');

            $consulta = "INSERT INTO personagem (Nome, Descricao, Imagem, Tipo, Faccao, Ativo) VALUES ('$Nome', '$Descricao', '$Imagem', '$Tipo', '$Faccao', $Ativo)";
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
                        <label for="">ID:</label><br>
                        <input id="editar_ID" type="text" disabled value="<?php echo $linha['ID']; ?>"><br>
                        <label for="">Nome:</label><br>
                        <input id="editar_nome" type="text" value="<?php echo $linha['Nome']; ?>"><br>
                        <label for="">Descrição:</label><br>
                        <input id="editar_descricao" type="text" value="<?php echo $linha['Descricao']; ?>"><br>
                        <label for="">Imagem:</label><br>
                        <input id="editar_imagem" type="text" value="<?php echo $linha['Imagem']; ?>"><br>
                        <label for="">Tipo:</label><br>
                        <select id="editar_tipo">
                            <option>Padrão</option>
                            <option>Companheiro</option>
                            <option>Usuário</option>
                        </select><br>
                        <label for="">Facção:</label><br>
                        <input id="editar_faccao" type="text" value="<?php echo $linha['Faccao']; ?>"><br>
                        <label for="">Ativo:</label><br>
                        <input id="editar_ativo" type="checkbox" <?php echo ord($linha['Ativo']) ? 'checked' : ''; ?>>
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