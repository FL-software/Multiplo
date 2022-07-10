<?php
    include "conexao.php";

    class Magia {
        public function listar() {
            $conexao = new Conexao();
            $con = $conexao -> conectarBanco();

            mysqli_set_charset($con,'utf8');

            $consulta = "SELECT * FROM Magia order by ID";
            $resultado = mysqli_query($con,$consulta) or die ("Falha na execução da consulta!");

            while($linha = mysqli_fetch_assoc($resultado))
            {
                $ID = $linha['ID'];
                $Nome = $linha["Nome"];
                $Descricao = $linha["Descricao"];
                $Ativo = ord($linha["Ativo"]) ? 'checked' : '';

                echo "<tr>";
                echo "<td>$ID</td>";
                echo "<td>$Nome</td>";
                echo "<td>$Descricao</td>";
                echo "<td><input type='checkbox' id='Ativo' $Ativo disabled></td>";
                echo "<td><button class='btn btn-success editar' id='$ID'>Editar</button></td>";
                echo "<td><button class='btn btn-danger excluir' id='$ID'>Excluir</button></td>";
                echo "</tr>";
            }
        }

        public function inserir($Nome,$Descricao,$Ativo) {
            $conexao = new Conexao();
            $con = $conexao -> conectarBanco();

            mysqli_set_charset($con,'utf8');

            $consulta = "INSERT INTO Magia (Nome, Descricao, Ativo) VALUES ('$Nome', '$Descricao', $Ativo)";
            $resultado = mysqli_query($con, $consulta) or die ("Falha ao tentar adicionar dados!");

            echo "Dados adicionados com sucesso!";
        }

        public function excluir($ID) {
            $conexao = new Conexao();
            $con = $conexao-> conectarBanco();

            mysqli_set_charset($con,'utf8');

            $consulta = "UPDATE Magia SET Ativo = 0 WHERE ID = $ID";
            $resultado = mysqli_query($con, $consulta) or die("Falha ao tentar desativado o registro!");

            echo "Registro desativado com sucesso!";
        }

        public function selecionar($ID) {
            $conexao = new Conexao();
            $con = $conexao-> conectarBanco();

            mysqli_set_charset($con,'utf8');

            $consulta = "SELECT * FROM Magia WHERE ID = $ID";

            if ($resultado = mysqli_query($con, $consulta)) {
                while ($linha = mysqli_fetch_assoc($resultado)) {
                    ?>
                    <label for="">ID:</label><br>
                    <input id="editar_ID" type="text" disabled value="<?php echo $linha['ID']; ?>"><br>
                    <label for="">Nome:</label><br>
                    <input id="editar_nome" type="text" value="<?php echo $linha['Nome']; ?>"><br>
                    <label for="">Descrição:</label><br>
                    <input id="editar_descricao" type="text" value="<?php echo $linha['Descricao']; ?>"><br>
                    <label for="">Ativo:</label><br>
                    <input id="editar_ativo" type="checkbox" <?php echo ord($linha['Ativo']) ? 'checked' : ''; ?>>
                    <?php
                }
            }
        }

        public function alterar($ID, $Nome, $Descricao, $Ativo) {
            $conexao = new Conexao();
            $con = $conexao-> conectarBanco();

            mysqli_set_charset($con,'utf8');

            $consulta = "UPDATE Magia SET Nome = '$Nome', Descricao = '$Descricao', Ativo = $Ativo WHERE ID = $ID";
            $resultado = mysqli_query($con, $consulta) or die("Falha ao tentar alterar dados!");

            echo "Dados alterados com sucesso!";
        }
    }
?>