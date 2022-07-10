<?php
    include "conexao.php";

    class Historia {
        public function listar() {
            $conexao = new Conexao();
            $con = $conexao -> conectarBanco();

            mysqli_set_charset($con,'utf8');

            $consulta = "SELECT * FROM Historia order by ID";
            $resultado = mysqli_query($con, $consulta) or die ("Falha na execução da consulta!");

            while($linha = mysqli_fetch_assoc($resultado))
            {
                $ID = $linha['ID'];
                $Nome = $linha["Nome"];
                $Descricao = $linha["Descricao"];
                $Ativo = ord($linha["Ativo"]) == 1 ? 'checked' : '';
                $IDCenario = $this -> obter_nome_cenario($linha["IDCenario"]);

                echo "<tr>";
                echo "<td>$ID</td>";
                echo "<td>$Nome</td>";
                echo "<td>$Descricao</td>";
                echo "<td>$IDCenario</td>";
                echo "<td><input type='checkbox' id='Ativo' $Ativo disabled></td>";
                echo "<td><button class='btn btn-success editar' id='$ID'>Editar</button></td>";
                echo "<td><button class='btn btn-danger excluir' id='$ID'>Excluir</button></td>";
                echo "</tr>";
            }
        }

        public function inserir($Nome, $Descricao, $Ativo, $IDCenario) {
            $conexao = new Conexao();
            $con = $conexao -> conectarBanco();

            mysqli_set_charset($con,'utf8');
        
            $consulta = "INSERT INTO Historia (Nome, Descricao, Ativo, IDCenario) VALUES ('$Nome', '$Descricao', $Ativo, $IDCenario)";
            $resultado = mysqli_query($con, $consulta) or die ("Falha ao tentar adicionar dados!");

            echo "Dados adicionados com sucesso!";
        }

        public function excluir($ID) {
            $conexao = new Conexao();
            $con = $conexao-> conectarBanco();

            mysqli_set_charset($con,'utf8');

            $consulta = "UPDATE Historia SET Ativo = 0 WHERE ID = $ID";
            $resultado = mysqli_query($con, $consulta) or die("Falha ao tentar desativado o registro!");

            echo "Registro desativado com sucesso!";
        }

        public function selecionar($ID) {
            $conexao = new Conexao();
            $con = $conexao-> conectarBanco();

            mysqli_set_charset($con,'utf8');

            $consulta = "SELECT * FROM Historia WHERE ID = $ID";

            if ($resultado = mysqli_query($con, $consulta)) {
                while ($linha = mysqli_fetch_assoc($resultado)) {
                    ?>
                        <label for="">ID:</label><br>
                        <input id="editar_ID" type="text" disabled value="<?php echo $linha['ID']; ?>"><br>
                        <label for="">Nome:</label><br>
                        <input id="editar_nome" type="text" value="<?php echo $linha['Nome']; ?>"><br>
                        <label for="">Descrição:</label><br>
                        <input id="editar_descricao" type="text" value="<?php echo $linha['Descricao']; ?>"><br>
                        <label for="">Cenário:</label><br>
                        <select id="inserir_id_cenario">
                            <?php
                                $opcoes = $this -> listar_opcoes_cenario($linha['IDJogo']);
                            ?>
                        </select><br>
                        <label for="">Ativo:</label><br>
                        <input id="editar_ativo" type="checkbox" <?php echo ord($linha['Ativo']) == 1 ? 'checked' : ''; ?>>
                    <?php
                }
            }
        }

        public function alterar($ID, $Nome, $Descricao, $Ativo, $IDCenario) {
            $conexao = new Conexao();
            $con = $conexao-> conectarBanco();

            mysqli_set_charset($con,'utf8');

            $consulta = "UPDATE Historia SET Nome = '$Nome', Descricao = '$Descricao', Ativo = $Ativo, IDCenario = $IDCenario WHERE ID = $ID";
            $resultado = mysqli_query($con, $consulta) or die("Falha ao tentar alterar dados!");

            echo "Dados alterados com sucesso!";
        }

        public function listar_opcoes_cenario($selecionado) {
            $conexao = new Conexao();
            $con = $conexao -> conectarBanco();

            mysqli_set_charset($con,'utf8');
    
            $consulta = "SELECT * FROM Cenario order by Nome";
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

        public function obter_nome_cenario($ID) {
            $conexao = new Conexao();
            $con = $conexao -> conectarBanco();

            mysqli_set_charset($con,'utf8');

            $consulta = "SELECT * FROM Cenario WHERE ID = $ID";
            $resultado = mysqli_query($con, $consulta) or die ("Falha na execução da consulta!");

            if($linha = mysqli_fetch_assoc($resultado))
            {
                $Nome = $linha["Nome"];

                return $Nome;
            }
        }
    }
?>