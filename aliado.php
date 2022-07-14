<?php
    include "conexao.php";

    class Aliado {
        public function listar() {
            $conexao = new Conexao();
            $con = $conexao -> conectarBanco();

            mysqli_set_charset($con,'utf8');

            $consulta = "SELECT * FROM Aliado order by ID";
            $resultado = mysqli_query($con, $consulta) or die ("Falha na execução da consulta!");

            while($linha = mysqli_fetch_assoc($resultado))
            {
                $ID = $linha['ID'];
                $Ativo = ord($linha["Ativo"]) == 1 || $linha["Ativo"] == 1 ? 'checked' : '';
                $IDPersonagemUsuarioA = $this -> obter_nome_personagem_usuario($linha["IDPersonagemUsuarioA"]);
                $IDPersonagemUsuarioB = $this -> obter_nome_personagem_usuario($linha["IDPersonagemUsuarioB"]);

                echo "<tr>";
                echo "<td>$ID</td>";
                echo "<td>$IDPersonagemUsuarioA</td>";
                echo "<td>$IDPersonagemUsuarioB</td>";
                echo "<td><input type='checkbox' id='Ativo' $Ativo disabled></td>";
                echo "<td><button class='btn btn-danger excluir' nome='$IDPersonagemUsuarioA, $IDPersonagemUsuarioB' id='$ID'>Desativar</button>";
                echo "<button class='btn btn-success editar' nome='$IDPersonagemUsuarioA, $IDPersonagemUsuarioB' id='$ID'>Editar</button></td>";
                echo "</tr>";
            }
        }

        public function inserir($Ativo, $IDPersonagemUsuarioA, $IDPersonagemUsuarioB) {
            $conexao = new Conexao();
            $con = $conexao -> conectarBanco();

            mysqli_set_charset($con,'utf8');
        
            $consulta = "INSERT INTO Aliado (Ativo, IDPersonagemUsuarioA, IDPersonagemUsuarioB) VALUES ($Ativo, $IDPersonagemUsuarioA, $IDPersonagemUsuarioB)";
            $resultado = mysqli_query($con, $consulta) or die ("Falha ao tentar adicionar dados!");

            echo "Dados adicionados com sucesso!";
        }

        public function excluir($ID) {
            $conexao = new Conexao();
            $con = $conexao-> conectarBanco();

            mysqli_set_charset($con,'utf8');

            $consulta = "UPDATE Aliado SET Ativo = 0 WHERE ID = $ID";
            $resultado = mysqli_query($con, $consulta) or die("Falha ao tentar desativado o registro!");

            echo "Registro desativado com sucesso!";
        }

        public function selecionar($ID) {
            $conexao = new Conexao();
            $con = $conexao-> conectarBanco();

            mysqli_set_charset($con,'utf8');

            $consulta = "SELECT * FROM Aliado WHERE ID = $ID";

            if ($resultado = mysqli_query($con, $consulta)) {
                while ($linha = mysqli_fetch_assoc($resultado)) {
                    ?>
                        <label for="">ID:</label><br>
                        <input id="editar_ID" type="text" disabled value="<?php echo $linha['ID']; ?>"><br>
                        <label for="">Personagem do Usuário A:</label><br>
                        <select id="editar_id_personagem_usuario_a">
                            <?php
                                $opcoes = $this -> listar_opcoes_personagem_usuario($linha['IDPersonagemUsuarioB']);
                            ?>
                        </select><br>
                        <label for="">Personagem do Usuário B:</label><br>
                        <select id="editar_id_personagem_usuario_b">
                            <?php
                                $opcoes = $this -> listar_opcoes_personagem_usuario($linha['IDPersonagemUsuarioB']);
                            ?>
                        </select><br>
                        <label for="">Ativo:</label><br>
                        <input id="editar_ativo" type="checkbox" <?php echo ord($linha['Ativo']) == 1 || $linha["Ativo"] == 1 ? 'checked' : ''; ?>>
                    <?php
                }
            }
        }

        public function alterar($ID, $Ativo, $IDPersonagemUsuarioA, $IDPersonagemUsuarioB) {
            $conexao = new Conexao();
            $con = $conexao-> conectarBanco();

            mysqli_set_charset($con,'utf8');

            $consulta = "UPDATE Aliado SET Ativo = $Ativo, IDPersonagemUsuarioA = $IDPersonagemUsuarioA, IDPersonagemUsuarioB = $IDPersonagemUsuarioB WHERE ID = $ID";
            $resultado = mysqli_query($con, $consulta) or die("Falha ao tentar alterar dados!");

            echo "Dados alterados com sucesso!";
        }

        public function listar_opcoes_personagem_usuario($selecionado) {
            $conexao = new Conexao();
            $con = $conexao -> conectarBanco();

            mysqli_set_charset($con,'utf8');
    
            $consulta = "SELECT * FROM PersonagemUsuario PU INNER JOIN Personagem P ON P.ID = PU.IDPersonagem order by Nome";
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

        public function obter_nome_personagem_usuario($ID) {
            $conexao = new Conexao();
            $con = $conexao -> conectarBanco();

            mysqli_set_charset($con,'utf8');

            $consulta = "SELECT * FROM PersonagemUsuario PU INNER JOIN Personagem P ON P.ID = PU.IDPersonagem WHERE PU.ID = $ID";
            $resultado = mysqli_query($con, $consulta) or die ("Falha na execução da consulta!");

            if($linha = mysqli_fetch_assoc($resultado))
            {
                $Nome = $linha["Nome"];

                return $Nome;
            }
        }
    }
?>