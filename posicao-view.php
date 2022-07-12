<?php 
  include "cabecalho.php";
  include "posicao.php";
?>
<main role="main" class="container">
  <div class="container">
    <div class="bg-white p-5 rounded">
      <div class="row">
        <h1 class="col">Posições</h1>
        <div id="inclusao"  class="col">
          <input id="incluir" type="button" value="Novo" class="btn btn-primary">
        </div>
      </div>
      <table class="table" border="0" width="100%" align-items="center" margin="auto">
        <thead class="thead-dark">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Coordenada X</th>
            <th scope="col">Coordenada Y</th>
            <th scope="col">Tabuleiro</th>
            <th scope="col">Ativo</th>
            <th scope="col"></th>
          <tr>
        </thead>
        <tbody>
          <?php
            $posicao = new Posicao();
            $listar = $posicao -> listar();
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
        <label for="">Coordenada X:</label><br>
        <input id="inserir_x" type="number"><br>
        <label for="">Coordenada Y:</label><br>
        <input id="inserir_y" type="number"><br>
        <label for="">Tabuleiro:</label><br>
        <select id="inserir_id_tabuleiro">
          <option value="" selected disabled>-</option>
          <?php
            $opcoes = $posicao -> listar_opcoes_tabuleiro(null);
          ?>
        </select><br>
        <label for="">Ativo:</label><br>
        <input id="inserir_ativo" type="checkbox" checked><br>
      </div>
      <div class="modal-footer">
        <button id="inserir" type="button" class="btn btn-success">Cadastrar</button>
        <button id="cancelar" type="button" class="btn btn-danger cancelar">Cancelar</button>
      </div>
    </div>
  </div>
</div>
<div id="modal-edicao" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">           
      <h2 id="modal-x-edicao" class="modal-title">Editar</h2>
      <div id="modal-corpo-edicao" class="modal-body">
      </div>
      <div class="modal-footer">
        <button id="alterar" type="button" class="btn btn-success">Alterar</button>
        <button id="cancelar" type="button" class="btn btn-danger cancelar">Cancelar</button>
      </div>
    </div>
  </div>
</div>
<script src="js/posicao-controller.js"></script>
<?php 
  include "rodape.php";
?>