<?php
    include "conexao.php";

    class Regra {
        public function listar() {
            $conexao = new Conexao();
            $con = $conexao -> conectarBanco();

            mysqli_set_charset($con,'utf8');

            $consulta = "SELECT * FROM Regra order by ID";
            $resultado = mysqli_query($con, $consulta) or die ("Falha na execução da consulta!");

            while($linha = mysqli_fetch_assoc($resultado))
            {
                $ID = $linha['ID'];
                $Nome = $linha["Nome"];
                $Descricao = $linha["Descricao"];
                $Ativo = ord($linha["Ativo"]) ? 'checked' : '';
                $IDJogo = $this -> obter_nome_jogo($linha["IDJogo"]);

                echo "<tr>";
                echo "<td>$ID</td>";
                echo "<td>$Nome</td>";
                echo "<td>$Descricao</td>";
                echo "<td>$IDJogo</td>";
                echo "<td><input type='checkbox' id='Ativo' $Ativo disabled></td>";
                echo "<td><button class='btn btn-success editar' id='$ID'>Editar</button></td>";
                echo "<td><button class='btn btn-danger excluir' id='$ID'>Excluir</button></td>";
                echo "</tr>";
            }
        }

        public function inserir($Nome, $Descricao, $Ativo, $IDJogo) {
            $conexao = new Conexao();
            $con = $conexao -> conectarBanco();

            mysqli_set_charset($con,'utf8');
        
            $consulta = "INSERT INTO Regra (Nome, Descricao, Ativo, IDJogo) VALUES ('$Nome', '$Descricao', $Ativo, $IDJogo)";
            $resultado = mysqli_query($con, $consulta) or die ("Falha ao tentar adicionar dados!");

            echo "Dados adicionados com sucesso!";
        }

        public function excluir($ID) {
            $conexao = new Conexao();
            $con = $conexao-> conectarBanco();    
            $query = "DELETE FROM Regra WHERE ID = $ID";
            $resultado = mysqli_query($con, $query) or die('Falha ao tentar excluir registro!');

            echo "Registro excluido com sucesso!";
        }

        public function selecionar($ID) {
            $conexao = new Conexao();
            $con = $conexao-> conectarBanco();

            mysqli_set_charset($con,'utf8');

            $consulta = "SELECT * FROM Regra WHERE ID = $ID";

            if ($resultado = mysqli_query($con, $consulta)) {
                while ($linha = mysqli_fetch_assoc($resultado)) {
                    ?>
                        <label for="">ID:</label><br>
                        <input id="editar_ID" type="text" disabled value="<?php echo $linha['ID']; ?>"><br>
                        <label for="">Nome:</label><br>
                        <input id="editar_nome" type="text" value="<?php echo $linha['Nome']; ?>"><br>
                        <label for="">Descrição:</label><br>
                        <input id="editar_descricao" type="text" value="<?php echo $linha['Descricao']; ?>"><br>
                        <label for="">Jogo:</label><br>
                        <select id="inserir_id_jogo">
                            <?php
                                $opcoes = $this -> listar_opcoes_jogo();
                            ?>
                        </select><br>
                        <label for="">Ativo:</label><br>
                        <input id="editar_ativo" type="checkbox" <?php echo ord($linha['Ativo']) ? 'checked' : ''; ?>>
                    <?php
                }
            }
        }
        
        public function alterar($ID, $Nome, $Descricao, $Ativo, $IDJogo) {
            $conexao = new Conexao();
            $con = $conexao-> conectarBanco();

            mysqli_set_charset($con,'utf8');

            $consulta = "UPDATE Regra SET Nome = '$Nome', Descricao = '$Descricao', Ativo = $Ativo, Jogo = $IDJogo WHERE ID = $ID";
            $resultado = mysqli_query($con, $consulta) or die("Falha ao tentar alterar dados!");

            echo "Dados alterados com sucesso!";
        }

        public function listar_opcoes_jogo() {
            $conexao = new Conexao();
            $con = $conexao -> conectarBanco();

            mysqli_set_charset($con,'utf8');
    
            $consulta = "SELECT * FROM Jogo order by Nome";
            $resultado = mysqli_query($con, $consulta) or die ("Falha na execução da consulta!");

            while($linha = mysqli_fetch_assoc($resultado))
            {
                $ID = $linha['ID'];
                $Nome = $linha["Nome"];

                echo "<Option Value='$ID'>$Nome</Option>";
            }
        }

        public function obter_nome_jogo($ID) {
            $conexao = new Conexao();
            $con = $conexao -> conectarBanco();

            mysqli_set_charset($con,'utf8');

            $consulta = "SELECT * FROM Jogo WHERE ID = $ID";
            $resultado = mysqli_query($con, $consulta) or die ("Falha na execução da consulta!");

            if($linha = mysqli_fetch_assoc($resultado))
            {
                $Nome = $linha["Nome"];

                return $Nome;
            }
        }
    }
?>