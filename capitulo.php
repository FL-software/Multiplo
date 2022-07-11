<?php
    include "conexao.php";

    class Capitulo {
        public function listar() {
            $conexao = new Conexao();
            $con = $conexao -> conectarBanco();

            mysqli_set_charset($con,'utf8');

            $consulta = "SELECT * FROM Capitulo order by ID";
            $resultado = mysqli_query($con, $consulta) or die ("Falha na execução da consulta!");

            while($linha = mysqli_fetch_assoc($resultado))
            {
                $ID = $linha['ID'];
                $Titulo = $linha["Titulo"];
                $Texto = $linha["Texto"];
                $Ativo = ord($linha["Ativo"]) == 1 || $linha["Ativo"] == 1 ? 'checked' : '';
                $IDHistoria = $this -> obter_nome_historia($linha["IDHistoria"]);

                echo "<tr>";
                echo "<td>$ID</td>";
                echo "<td>$Titulo</td>";
                echo "<td>$Texto</td>";
                echo "<td>$IDHistoria</td>";
                echo "<td><input type='checkbox' id='Ativo' $Ativo disabled></td>";
                echo "<td><button class='btn btn-success editar' titulo='$Titulo' id='$ID'>Editar</button></td>";
                echo "<td><button class='btn btn-danger excluir' titulo='$Titulo' id='$ID'>Desativar</button></td>";
                echo "</tr>";
            }
        }

        public function inserir($Titulo, $Texto, $Ativo, $IDHistoria) {
            $conexao = new Conexao();
            $con = $conexao -> conectarBanco();

            mysqli_set_charset($con,'utf8');
        
            $consulta = "INSERT INTO Capitulo (Titulo, Texto, Ativo, IDHistoria) VALUES ('$Titulo', '$Texto', $Ativo, $IDHistoria)";
            $resultado = mysqli_query($con, $consulta) or die ("Falha ao tentar adicionar dados!");

            echo "Dados adicionados com sucesso!";
        }

        public function excluir($ID) {
            $conexao = new Conexao();
            $con = $conexao-> conectarBanco();

            mysqli_set_charset($con,'utf8');

            $consulta = "UPDATE Capitulo SET Ativo = 0 WHERE ID = $ID";
            $resultado = mysqli_query($con, $consulta) or die("Falha ao tentar desativado o registro!");

            echo "Registro desativado com sucesso!";
        }

        public function selecionar($ID) {
            $conexao = new Conexao();
            $con = $conexao-> conectarBanco();

            mysqli_set_charset($con,'utf8');

            $consulta = "SELECT * FROM Capitulo WHERE ID = $ID";

            if ($resultado = mysqli_query($con, $consulta)) {
                while ($linha = mysqli_fetch_assoc($resultado)) {
                    ?>
                        <label for="">ID:</label><br>
                        <input id="editar_ID" type="text" disabled value="<?php echo $linha['ID']; ?>"><br>
                        <label for="">Titulo:</label><br>
                        <input id="editar_titulo" type="text" value="<?php echo $linha['Titulo']; ?>"><br>
                        <label for="">Texto:</label><br>
                        <input id="editar_texto" type="text" value="<?php echo $linha['Texto']; ?>"><br>
                        <label for="">Cenário:</label><br>
                        <select id="editar_id_historia">
                            <?php
                                $opcoes = $this -> listar_opcoes_historia($linha['IDJogo']);
                            ?>
                        </select><br>
                        <label for="">Ativo:</label><br>
                        <input id="editar_ativo" type="checkbox" <?php echo ord($linha['Ativo']) == 1 || $linha["Ativo"] == 1 ? 'checked' : ''; ?>>
                    <?php
                }
            }
        }

        public function alterar($ID, $Titulo, $Texto, $Ativo, $IDHistoria) {
            $conexao = new Conexao();
            $con = $conexao-> conectarBanco();

            mysqli_set_charset($con,'utf8');

            $consulta = "UPDATE Capitulo SET Titulo = '$Titulo', Texto = '$Texto', Ativo = $Ativo, IDHistoria = $IDHistoria WHERE ID = $ID";
            $resultado = mysqli_query($con, $consulta) or die("Falha ao tentar alterar dados!");

            echo "Dados alterados com sucesso!";
        }

        public function listar_opcoes_historia($selecionado) {
            $conexao = new Conexao();
            $con = $conexao -> conectarBanco();

            mysqli_set_charset($con,'utf8');
    
            $consulta = "SELECT * FROM Historia order by Nome";
            $resultado = mysqli_query($con, $consulta) or die ("Falha na execução da consulta!");

            while($linha = mysqli_fetch_assoc($resultado))
            {
                $ID = $linha['ID'];
                $Nome = $linha["Nome"];

                if ($ID == $selecionado) {
                    echo "<Option Value='$ID' selected>$Nome</Option>";
                }
                else {
                    echo "<Option Value='$ID'>$Nome</Option>";
                }
            }
        }

        public function obter_nome_historia($ID) {
            $conexao = new Conexao();
            $con = $conexao -> conectarBanco();

            mysqli_set_charset($con,'utf8');

            $consulta = "SELECT * FROM Historia WHERE ID = $ID";
            $resultado = mysqli_query($con, $consulta) or die ("Falha na execução da consulta!");

            if($linha = mysqli_fetch_assoc($resultado))
            {
                $Nome = $linha["Nome"];

                return $Nome;
            }
        }
    }
?>