<?php
    class Conexao {
        public function conectarBanco() {
            $con = mysqli_connect('localhost', 'root', '', 'multiplo') or die ("Falha na conexão com o banco de dados!");

            return $con;
        }
    }
?>