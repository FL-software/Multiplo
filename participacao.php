<?php
    include "conexao.php";

    class Participacao {
        public function listar() {
            $conexao = new Conexao();
            $con = $conexao -> conectarBanco();

            mysqli_set_charset($con,'utf8');

            $consulta = "SELECT * FROM Participacao order by ID";
            $resultado = mysqli_query($con, $consulta) or die ("Falha na execução da consulta!");

            while($linha = mysqli_fetch_assoc($resultado))
            {
                $ID = $linha['ID'];
                $Ativo = ord($linha["Ativo"]) == 1 || $linha["Ativo"] == 1 ? 'checked' : '';
                $IDPersonagemUsuario = $this -> obter_nome_personagem_usuario($linha["IDPersonagemUsuario"]);
                $IDPartida = $this -> obter_nome_partida($linha["IDPartida"]);

                echo "<tr>";
                echo "<td>$ID</td>";
                echo "<td>$IDPersonagemUsuario</td>";
                echo "<td>$IDPartida</td>";
                echo "<td><input type='checkbox' id='Ativo' $Ativo disabled></td>";
                echo "<td><button class='btn btn-danger excluir' nome='$IDPersonagemUsuario, $IDPartida' id='$ID'>Desativar</button>";
                echo "<button class='btn btn-success editar' nome='$IDPersonagemUsuario, $IDPartida' id='$ID'>Editar</button></td>";
                echo "</tr>";
            }
        }

        public function inserir($Ativo, $IDPersonagemUsuario, $IDPartida) {
            $conexao = new Conexao();
            $con = $conexao -> conectarBanco();

            mysqli_set_charset($con,'utf8');
        
            $consulta = "INSERT INTO Participacao (Ativo, IDPersonagemUsuario, IDPartida) VALUES ($Ativo, $IDPersonagemUsuario, $IDPartida)";
            $resultado = mysqli_query($con, $consulta) or die ("Falha ao tentar adicionar dados!");

            echo "Dados adicionados com sucesso!";
        }

        public function excluir($ID) {
            $conexao = new Conexao();
            $con = $conexao-> conectarBanco();

            mysqli_set_charset($con,'utf8');

            $consulta = "UPDATE Participacao SET Ativo = 0 WHERE ID = $ID";
            $resultado = mysqli_query($con, $consulta) or die("Falha ao tentar desativado o registro!");

            echo "Registro desativado com sucesso!";
        }

        public function selecionar($ID) {
            $conexao = new Conexao();
            $con = $conexao-> conectarBanco();

            mysqli_set_charset($con,'utf8');

            $consulta = "SELECT * FROM Participacao WHERE ID = $ID";

            if ($resultado = mysqli_query($con, $consulta)) {
                while ($linha = mysqli_fetch_assoc($resultado)) {
                    ?>
                        <label for="">ID:</label><br>
                        <input id="editar_ID" type="text" disabled value="<?php echo $linha['ID']; ?>"><br>
                        <label for="">Personagem do Usuário:</label><br>
                        <select id="editar_id_personagem_usuario">
                            <?php
                                $opcoes = $this -> listar_opcoes_personagem_usuario($linha['IDPartida']);
                            ?>
                        </select><br>
                        <label for="">Partida:</label><br>
                        <select id="editar_id_partida">
                            <?php
                                $opcoes = $this -> listar_opcoes_partida($linha['IDPartida']);
                            ?>
                        </select><br>
                        <label for="">Ativo:</label><br>
                        <input id="editar_ativo" type="checkbox" <?php echo ord($linha['Ativo']) == 1 || $linha["Ativo"] == 1 ? 'checked' : ''; ?>>
                    <?php
                }
            }
        }

        public function alterar($ID, $Ativo, $IDPersonagemUsuario, $IDPartida) {
            $conexao = new Conexao();
            $con = $conexao-> conectarBanco();

            mysqli_set_charset($con,'utf8');

            $consulta = "UPDATE Participacao SET Ativo = $Ativo, IDPersonagemUsuario = $IDPersonagemUsuario, IDPartida = $IDPartida WHERE ID = $ID";
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

        public function listar_opcoes_partida($selecionado) {
            $conexao = new Conexao();
            $con = $conexao -> conectarBanco();

            mysqli_set_charset($con,'utf8');
    
            $consulta = "SELECT * FROM Partida order by Nome";
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

        public function obter_nome_partida($ID) {
            $conexao = new Conexao();
            $con = $conexao -> conectarBanco();

            mysqli_set_charset($con,'utf8');

            $consulta = "SELECT * FROM Partida WHERE ID = $ID";
            $resultado = mysqli_query($con, $consulta) or die ("Falha na execução da consulta!");

            if($linha = mysqli_fetch_assoc($resultado))
            {
                $Nome = $linha["Nome"];

                return $Nome;
            }
        }
    }
?>