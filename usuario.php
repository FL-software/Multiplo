<?php
    include "conexao.php";

    class Usuario {
        public function listar() {
            $conexao = new Conexao();
            $con = $conexao -> conectarBanco();

            mysqli_set_charset($con,'utf8');

            $consulta = "SELECT * FROM Usuario order by ID";
            $resultado = mysqli_query($con, $consulta) or die ("Falha na execução da consulta!");

            while($linha = mysqli_fetch_assoc($resultado))
            {
                $ID = $linha['ID'];
                $Nome = $linha["Nome"];
                $Login = $linha["Login"];
                $Senha = $linha["Senha"];
                $Ativo = ord($linha["Ativo"]) == 1 || $linha["Ativo"] == 1 ? 'checked' : '';
                $IDPerfil = $this -> obter_nome_perfil($linha["IDPerfil"]);

                echo "<tr>";
                echo "<td>$ID</td>";
                echo "<td>$Nome</td>";
                echo "<td>$Login</td>";
                echo "<td>$Senha</td>";
                echo "<td>$IDPerfil</td>";
                echo "<td><input type='checkbox' id='Ativo' $Ativo disabled></td>";
                echo "<td><button class='btn btn-danger excluir' nome='$Nome' id='$ID'>Desativar</button>";
                echo "<button class='btn btn-success editar' nome='$Nome' id='$ID'>Editar</button></td>";
                echo "</tr>";
            }
        }

        public function inserir($Nome, $Login, $Senha, $Ativo, $IDPerfil) {
            $conexao = new Conexao();
            $con = $conexao -> conectarBanco();

            mysqli_set_charset($con,'utf8');
        
            $consulta = "INSERT INTO Usuario (Nome, Login, Senha, Ativo, IDPerfil) VALUES ('$Nome', '$Login', '$Senha', $Ativo, $IDPerfil)";

            echo ($consulta);
            $resultado = mysqli_query($con, $consulta) or die ("Falha ao tentar adicionar dados!");

            echo "Dados adicionados com sucesso!";
        }

        public function excluir($ID) {
            $conexao = new Conexao();
            $con = $conexao-> conectarBanco();

            mysqli_set_charset($con,'utf8');

            $consulta = "UPDATE Usuario SET Ativo = 0 WHERE ID = $ID";
            $resultado = mysqli_query($con, $consulta) or die("Falha ao tentar desativado o registro!");

            echo "Registro desativado com sucesso!";
        }

        public function selecionar($ID) {
            $conexao = new Conexao();
            $con = $conexao-> conectarBanco();

            mysqli_set_charset($con,'utf8');

            $consulta = "SELECT * FROM Usuario WHERE ID = $ID";

            if ($resultado = mysqli_query($con, $consulta)) {
                while ($linha = mysqli_fetch_assoc($resultado)) {
                    ?>
                        <label for="">ID:</label><br>
                        <input id="editar_ID" type="text" disabled value="<?php echo $linha['ID']; ?>"><br>
                        <label for="">Nome:</label><br>
                        <input id="editar_nome" type="text" value="<?php echo $linha['Nome']; ?>"><br>
                        <label for="">Login:</label><br>
                        <input id="editar_login" type="text" value="<?php echo $linha['Login']; ?>"><br>
                        <label for="">Senha:</label><br>
                        <input id="editar_senha" type="password" value="<?php echo $linha['Senha']; ?>"><br>
                        <label for="">Perfil:</label><br>
                        <select id="editar_id_perfil">
                            <?php
                                $opcoes = $this -> listar_opcoes_perfil($linha['IDJogo']);
                            ?>
                        </select><br>
                        <label for="">Ativo:</label><br>
                        <input id="editar_ativo" type="checkbox" <?php echo ord($linha['Ativo']) == 1 || $linha["Ativo"] == 1 ? 'checked' : ''; ?>>
                    <?php
                }
            }
        }

        public function alterar($ID, $Nome, $Login, $Login, $Ativo, $IDPerfil) {
            $conexao = new Conexao();
            $con = $conexao-> conectarBanco();

            mysqli_set_charset($con,'utf8');

            $consulta = "UPDATE Usuario SET Nome = '$Nome', Login = '$Login', Senha = '$Senha', Ativo = $Ativo, IDPerfil = $IDPerfil WHERE ID = $ID";
            $resultado = mysqli_query($con, $consulta) or die("Falha ao tentar alterar dados!");

            echo "Dados alterados com sucesso!";
        }

        public function listar_opcoes_perfil($selecionado) {
            $conexao = new Conexao();
            $con = $conexao -> conectarBanco();

            mysqli_set_charset($con,'utf8');
    
            $consulta = "SELECT * FROM Perfil order by Nome";
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

        public function obter_nome_perfil($ID) {
            $conexao = new Conexao();
            $con = $conexao -> conectarBanco();

            mysqli_set_charset($con,'utf8');

            $consulta = "SELECT * FROM Perfil WHERE ID = $ID";
            $resultado = mysqli_query($con, $consulta) or die ("Falha na execução da consulta!");

            if($linha = mysqli_fetch_assoc($resultado))
            {
                $Nome = $linha["Nome"];

                return $Nome;
            }
        }
    }
?>