<?php
    include "conexao.php";

    class Grimorio {
        public function listar() {
            $conexao = new Conexao();
            $con = $conexao -> conectarBanco();

            mysqli_set_charset($con,'utf8');

            $consulta = "SELECT * FROM Grimorio order by ID";
            $resultado = mysqli_query($con, $consulta) or die ("Falha na execução da consulta!");

            while($linha = mysqli_fetch_assoc($resultado))
            {
                $ID = $linha['ID'];
                $Ativo = ord($linha["Ativo"]) == 1 || $linha["Ativo"] == 1 ? 'checked' : '';
                $IDPersonagemUsuario = $this -> obter_nome_personagem_usuario($linha["IDPersonagemUsuario"]);
                $IDMagia = $this -> obter_nome_magia($linha["IDMagia"]);

                echo "<tr>";
                echo "<td>$ID</td>";
                echo "<td>$IDPersonagemUsuario</td>";
                echo "<td>$IDMagia</td>";
                echo "<td><input type='checkbox' id='Ativo' $Ativo disabled></td>";
                echo "<td><button class='btn btn-danger excluir' nome='$IDPersonagemUsuario, $IDMagia' id='$ID'>Desativar</button>";
                echo "<button class='btn btn-success editar' nome='$IDPersonagemUsuario, $IDMagia' id='$ID'>Editar</button></td>";
                echo "</tr>";
            }
        }

        public function inserir($Ativo, $IDPersonagemUsuario, $IDMagia) {
            $conexao = new Conexao();
            $con = $conexao -> conectarBanco();

            mysqli_set_charset($con,'utf8');
        
            $consulta = "INSERT INTO Grimorio (Ativo, IDPersonagemUsuario, IDMagia) VALUES ($Ativo, $IDPersonagemUsuario, $IDMagia)";
            $resultado = mysqli_query($con, $consulta) or die ("Falha ao tentar adicionar dados!");

            echo "Dados adicionados com sucesso!";
        }

        public function excluir($ID) {
            $conexao = new Conexao();
            $con = $conexao-> conectarBanco();

            mysqli_set_charset($con,'utf8');

            $consulta = "UPDATE Grimorio SET Ativo = 0 WHERE ID = $ID";
            $resultado = mysqli_query($con, $consulta) or die("Falha ao tentar desativado o registro!");

            echo "Registro desativado com sucesso!";
        }

        public function selecionar($ID) {
            $conexao = new Conexao();
            $con = $conexao-> conectarBanco();

            mysqli_set_charset($con,'utf8');

            $consulta = "SELECT * FROM Grimorio WHERE ID = $ID";

            if ($resultado = mysqli_query($con, $consulta)) {
                while ($linha = mysqli_fetch_assoc($resultado)) {
                    ?>
                        <label for="">ID:</label><br>
                        <input id="editar_ID" type="text" disabled value="<?php echo $linha['ID']; ?>"><br>
                        <label for="">Personagem do Usuário:</label><br>
                        <select id="editar_id_personagem_usuario">
                            <?php
                                $opcoes = $this -> listar_opcoes_personagem_usuario($linha['IDMagia']);
                            ?>
                        </select><br>
                        <label for="">Magia:</label><br>
                        <select id="editar_id_magia">
                            <?php
                                $opcoes = $this -> listar_opcoes_magia($linha['IDMagia']);
                            ?>
                        </select><br>
                        <label for="">Ativo:</label><br>
                        <input id="editar_ativo" type="checkbox" <?php echo ord($linha['Ativo']) == 1 || $linha["Ativo"] == 1 ? 'checked' : ''; ?>>
                    <?php
                }
            }
        }

        public function alterar($ID, $Ativo, $IDPersonagemUsuario, $IDMagia) {
            $conexao = new Conexao();
            $con = $conexao-> conectarBanco();

            mysqli_set_charset($con,'utf8');

            $consulta = "UPDATE Grimorio SET Ativo = $Ativo, IDPersonagemUsuario = $IDPersonagemUsuario, IDMagia = $IDMagia WHERE ID = $ID";
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

        public function listar_opcoes_Magia($selecionado) {
            $conexao = new Conexao();
            $con = $conexao -> conectarBanco();

            mysqli_set_charset($con,'utf8');
    
            $consulta = "SELECT * FROM Magia order by Nome";
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

        public function obter_nome_magia($ID) {
            $conexao = new Conexao();
            $con = $conexao -> conectarBanco();

            mysqli_set_charset($con,'utf8');

            $consulta = "SELECT * FROM Magia WHERE ID = $ID";
            $resultado = mysqli_query($con, $consulta) or die ("Falha na execução da consulta!");

            if($linha = mysqli_fetch_assoc($resultado))
            {
                $Nome = $linha["Nome"];

                return $Nome;
            }
        }
    }
?>