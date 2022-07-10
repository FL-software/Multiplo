<?php 
  include "cabecalho.php";
  include "item.php";
?>
<main role="main" class="container">
  <div class="container my-5">
    <div class="bg-white p-5 rounded">
      <div>
        <h1>Itens</h1>
        <div id="inclusao">
          <input id="incluir" type="button" value="Novo" class="btn btn-primary">
        </div>
      </div>
      <table class="table" border="0" width="100%" align-items="center" margin="auto">
        <thead class="thead-dark">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Descrição</th>
            <th scope="col">Ativo</th>
            <th scope="col"></th>
            <th scope="col"></th>
          <tr>
        </thead>
        <tbody>
          <?php
            $item = new Item();
            $listar = $item -> listar();
          ?>
        </tbody>
      </table>
    </div>
  </div>
</main>
<div id="modal-inclusao" class="modal fade bg-dark" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 id="modal-label" class="modal-title">Cadastrar</h5>
      </div>
      <div class="modal-body">        
        <label for="">Nome:</label><br>
        <input id="inserir_nome" type="text"><br>
        <label for="">Descrição:</label><br>
        <input id="inserir_descricao" type="text"><br>
        <label for="">Ativo:</label><br>
        <input id="inserir_ativo" type="checkbox" checked><br>
      </div>
      <div class="modal-footer">
        <button id="cancelar" type="button" class="btn btn-danger cancelar">Cancelar</button>
        <button id="inserir" type="button" class="btn btn-success">Cadastrar</button>
      </div>
    </div>
  </div>
</div>
<div id="modal-edicao" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">           
      <h2 id="modal-titulo-edicao" class="modal-title">Editar</h2>
      <div id="modal-corpo-edicao" class="modal-body">
      </div>
      <div class="modal-footer">
        <button id="cancelar" type="button" class="btn btn-danger cancelar">Cancelar</button>
        <button id="alterar" type="button" class="btn btn-success">Alterar</button>
      </div>
    </div>
  </div>
</div>
<script src="js/item-controller.js"></script>
<?php 
  include "rodape.php";
?>