<?php 
  include "cabecalho.php";
  include "conexao.php";
  include "log.php";
?>
<main role="main" class="container">
  <div class="container">
    <div class="bg-white p-5 rounded">
      <div class="row">
        <h1 class="col">Log</h1>
      </div>
      <table class="table" border="0" width="100%" align-items="center" margin="auto">
        <thead class="thead-dark">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Ação</th>
            <th scope="col">Descrição</th>
            <th scope="col">Data</th>
            <th scope="col">Entidade</th>
            <th scope="col">Chave</th>
            <th scope="col">Usuário</th>
          <tr>
        </thead>
        <tbody>
          <?php
            $log = new Log();
            $listar = $log -> listar();
          ?>
        </tbody>
      </table>
    </div>
  </div>
</main>
<?php 
  include "rodape.php";
?>